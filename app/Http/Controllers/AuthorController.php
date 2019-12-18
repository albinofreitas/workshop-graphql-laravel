<?php

namespace App\Http\Controllers;

use App\User;

class AuthorController extends Controller
{
    public function index()
    {
        $author = User::findOrFail(request('id'));

        return response()->json([
            'posts' => $author->posts,
        ]);
    }
}
