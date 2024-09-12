<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $count = $request->get("count", 6);
        $posts = Post::query()->orderBy('id', 'desc')->paginate($count)->onEachSide(1);
        return response()->json(PostResource::collection($posts));
    }

    public function show(Post $post) {
        try {
            return response()->json(new PostResource($post));
        } catch(Exception $e) {
            return response()->json(['error' => $e], 400);
        }
    }
}
