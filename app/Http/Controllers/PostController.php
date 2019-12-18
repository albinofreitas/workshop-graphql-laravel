<?php

namespace App\Http\Controllers;

use App\Http\Middleware\GetPostMiddleware;
use App\Post;
use App\User;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(GetPostMiddleware::class)->only([
            'show',
            'delete',
        ]);
    }

    public function index()
    {
        return response()->json([
            'posts' => Post::all(),
        ]);
    }

    public function store()
    {
        $author = User::findOrFail(request('author'));

        $post = Post::create([
            'title' => request('title'),
            'content' => request('content'),
            'author' => $author->id,
        ]);

        return response()->json([
            'post' => $post->load('author'),
        ], 201);
    }

    public function show()
    {
        $post = request()->offsetGet('post');

        return response()->json([
            'post' => $post->load('author'),
        ]);
    }

    public function delete()
    {
        $post = request()->offsetGet('post');

        $post->delete();

        return response()->json([], 204);
    }
}
