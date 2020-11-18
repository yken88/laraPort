<?php

namespace App\Services;

use App\Models\Post;
use App\Http\Requests\StorePostForm;
use Illuminate\Http\Request;

class CheckSearch {
    public static function checkData(Request $request)
    {

        $user_id = $request->user_id;
        $resident_id = $request->resident_id;
        $unit_id = $request->unit_id;

        if ($user_id) {
            $posts = Post::where('user_id', $user_id)
                ->simplePaginate(5);
        }

        if ($resident_id) {
            $posts = Post::where('resident_id', $resident_id)
                ->simplePaginate(5);
        }

        if ($user_id && $resident_id) {
            $posts = Post::where('user_id', $user_id)
                ->where('resident_id', $resident_id)
                ->simplePaginate(5);
        }

        if ($unit_id) {
            $posts = Post::where('unit_id', $unit_id)
                ->simplePaginate(5);
        }

        if ($user_id && $resident_id && $unit_id) {
            $posts = Post::where('user_id', $user_id)
                ->where('resident_id', $user_id)
                ->where('unit_id', $unit_id)
                ->simplePaginate(5);
        }

        if (!$user_id && !$resident_id && !$unit_id){
            $posts = null;
        }

        return $posts;

    }
}