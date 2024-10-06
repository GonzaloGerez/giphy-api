<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class GifController extends Controller
{
    //

    /**
     * This method can be used to search a gif collection and returns it in an array
     */

     public function search(Request $request){

        $validator = Validator::make($request->all(), [
            'query'=> 'required|string',
            'limit' => 'nullable|integer',
            'offset' => 'nullable|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error'=> $validator->errors(),
                'message'=> "Error"
            ], 422);
        }

        $apiUrl = config('services.giphy_api.url');
        $apiKey = config('services.giphy_api.key');

        $response = Http::get("{$apiUrl}/search", [
            'api_key'=> $apiKey,
            'q'=> $request->input('query'),
            'limit'=> $request->input('limit'),
            'offset'=> $request->input('offset')
        ]);

        if ($response->successful()) {
            return $response->json();
        }else{
            return response()->json([
                'error'=> 'API error',
                'req'=>$response->json()
            ], $response->status());
        }
     }


     /**
      * This method will be used to find a particular GIF data by id
      */

     public function searchById(Request $request){
        $validator = Validator::make($request->all(), [
            'id'=> 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error'=> $validator->errors(),
                'message'=> "Error"
            ], 422);
        }


        $apiUrl = config('services.giphy_api.url');
        $apiKey = config('services.giphy_api.key');

        $response = Http::get("{$apiUrl}/{$request->input('id')}", [
            'api_key'=> $apiKey
        ]);

        if ($response->successful()) {
            return $response->json();
        }else{
            return response()->json([
                'error'=> 'API error',
                'res' => $response->json()
            ], $response->status());
        }
     }

}
