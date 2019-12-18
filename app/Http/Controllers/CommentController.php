<?php

namespace App\Http\Controllers;

use App\Http\Middleware\GetPostMiddleware;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware(GetPostMiddleware::class)->only([
            'index',
            'store',
        ]);
    }

    public function index()
    {
        $post = request()->offsetGet('post');

        return response()->json([
            'comments' => $post->comments,
        ]);
    }

    public function store()
    {
        $post = request()->offsetGet('post');

        $comment = $post->comments()->create([
            'content' => request('content'),
            'user_id' => request('user_id'),
        ]);

        return response()->json([
            'comment' => $comment,
        ], 201);
    }
}
