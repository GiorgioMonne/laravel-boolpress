<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(){

        $posts = Post::where("published", true)->with(["category", "tags"])->get();
        return response()->json($posts);
    }

    public function show($slug){
        $posts = Post::where("slug", $slug)->with(["category","tags"])->first();

        return response()->json($posts);
    }
}
