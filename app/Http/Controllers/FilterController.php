<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FilterController extends Controller
{
    public function filter($id)
    {
        try {
            // Make the HTTP request to fetch category data
            $response = Http::get(env('API_BASE_URL') . '/menu/category/' . $id);

            // Check if the request was successful
            if ($response->successful()) {
                $data = $response->json();
                return view('filter', ['data' => $data]);
            } else {
                // Handle unsuccessful responses
                return view('filter', ['data' => [], 'message' => 'No data found for the given category ID.']);
            }
        } catch (Exception $e) {
            // Log the exception for debugging
            Log::error('Error fetching category data:', ['error' => $e->getMessage()]);

            // Return the view with an error message
            return view('filter', ['data' => [], 'message' => 'An error occurred while fetching data.']);
        }
    }
}
