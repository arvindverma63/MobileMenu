<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MenuController extends Controller
{
    public function welcome(Request $request)
    {
        // Validate the incoming request to ensure all necessary data is provided
        $request->validate([
            'restaurantId' => 'required|string',
            'tableNo' => 'required|string',
        ]);

        try {
            // Send the GET request to the external API
            $response = Http::get(env('API_BASE_URL') . '/webMenu', [
                'restaurantId' => $request->input('restaurantId'),
                'tableNo' => $request->input('tableNo'),
            ]);

            Cache::put('restaurantId', $request['restaurantId']);
            Cache::put('tableNo', $request['tableNo']);

             // Fetch category data
             $response2 = Http::get(env('API_BASE_URL') . '/webMenu/categories', [
                'restaurantId' => $request['restaurantId'],
            ]);

            // Check if the request was successful (200 OK)
            if ($response->successful()) {
                return view('index', ['data' => $response->json(),'category'=>$response2->json(), 'tableNo' => $request['tableNo']]);
            } else {
                // Handle unsuccessful responses
                return response()->json([
                    'message' => 'Failed to fetch data from the API.',
                    'status' => $response->status(),
                    'error' => $response->body()
                ], $response->status());
            }
        } catch (\Exception $e) {
            // Catch any errors during the request and return an appropriate response
            return response()->json([
                'message' => 'An error occurred while fetching the data.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function homeBack()
    {
        // Validate required cache keys
        $restaurantId = Cache::get('restaurantId');
        $tableNo = Cache::get('tableNo');

        if (!$restaurantId || !$tableNo) {
            return redirect()->back()->withErrors(['error' => 'Restaurant ID or Table Number is missing.']);
        }

        try {
            // Fetch menu data
            $response = Http::get(env('API_BASE_URL') . '/webMenu', [
                'restaurantId' => $restaurantId,
                'tableNo' => $tableNo,
            ]);

            // Fetch category data
            $response2 = Http::get(env('API_BASE_URL') . '/webMenu/categories', [
                'restaurantId' => $restaurantId,
            ]);

            // Check if both responses are successful
            if ($response->successful() && $response2->successful()) {
                return view('index', [
                    'data' => $response->json(),
                    'tableNo' => $tableNo,
                    'category' => $response2->json(),
                ]);
            } else {
                // Handle unsuccessful responses
                return redirect()->back()->withErrors(['error' => 'Failed to fetch data from the server.']);
            }
        } catch (Exception $e) {
            // Log the exception for debugging
            Log::error('Error in homeBack:', ['message' => $e->getMessage()]);

            // Redirect with error message
            return redirect()->back()->withErrors(['error' => 'An unexpected error occurred.']);
        }
    }



    public function cart()
    {
        return view('cart');
    }
}
