<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();
    }

    public function store(Request $request)
    {
        try {
            $post = new Post();
            $post->title = $request->title;
            $post->body = $request->body;

            if($post->save()) {
                return response()->json(['status' => 'success', 'message' => 'Post created successfully']);
            }
        } catch (\Exception $e) {
            return response()->jsoin(['status' => 'errot', 'message' => $e->getMessage()]);
        }
    }
}
