<?php

namespace App\Http\Middleware;

use App\Post;
use Closure;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GetPostMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $post = Post::findOrFail($request->id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Post not found.',
            ], 404);
        }

        $request->offsetSet('post', $post);

        return $next($request);
    }
}
