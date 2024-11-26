<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

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

            Cache::put('restaurantId',$request['restaurantId']);
            Cache::put('tableNo',$request['tableNo']);

            // Check if the request was successful (200 OK)
            if ($response->successful()) {
                return view('index',['data'=>$response->json(),'tableNo'=>$request['tableNo']]);
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

    public function homeBack(){
        $response = Http::get(env('API_BASE_URL') . '/webMenu', [
            'restaurantId' => Cache::get('restaurantId'),
            'tableNo' => Cache::get('tableNo'),
        ]);


        // Check if the request was successful (200 OK)
        if ($response->successful()) {
            return view('index',['data'=>$response->json(),'tableNo'=>Cache::get('tableNo')]);
        }
    }

    public function cart(){
        return view('cart');
    }
 }
