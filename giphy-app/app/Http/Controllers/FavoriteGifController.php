<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FavoriteGif;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class FavoriteGifController extends Controller
{
    /**
     * This method will be used to store favorite gifs
     */

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'gif_id' => 'required|string',
             'alias' => 'required|string',
             'user_id' => 'required|string',
         ]);

        if ($validator->fails()) {
            return response()->json([
                'error'=> $validator->errors(),
                'message'=> "Cannot process request"
            ], 422);
        }

        $user = User::find($request->input('user_id'));

        if (!isset($user)) {
            return response()->json([
                'message'=> "The user is not valid"
            ], 400);
        }

        $apiUrl = config('services.giphy_api.url');
        $apiKey = config('services.giphy_api.key');

        $gif = Http::get("{$apiUrl}/{$request->input('gif_id')}", [
            'api_key'=> $apiKey
        ]);

        if (!$gif->successful()) {
            return response()->json([
                'message'=> 'The requested gif not exists'
            ],400);
        }

        $favorite = FavoriteGif::create([
            'gif_id'=> $request->gif_id,
            'user_id'=> $request->user_id,
            'alias'=> $request->alias
        ]);

        if (isset($favorite)) {
            return response()->json([
                "message"=> "Gif saved as favorite"
            ],200);
        }else{
            return response()->json([
                "message"=> "Bad request"
            ],400);
        };
    }
}
