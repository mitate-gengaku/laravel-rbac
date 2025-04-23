<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth_id = Auth::id();

        $posts = Post::query()
            ->where('user_id', '=', $auth_id)
            ->get();

        return response()->json([
            'posts' => $posts,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $auth_id = Auth::id();

        $body = $request->only('title', 'body');

        $data = array_merge($body, [
            'user_id' => $auth_id,
        ]);

        Post::create($data);

        return response()->json([
            'message' => '投稿を作成しました',
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::query()
            ->where('id', '=', $id)
            ->first();

        return response()->json([
            'post' => $post,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $body = $request->only('title', 'body');
        $auth_id = Auth::id();

        Post::query()
            ->where('id', '=', $id)
            ->where('user_id', '=', $auth_id)
            ->update($body);

        return response()->json([
            'message' => '投稿を更新しました',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $auth_id = Auth::id();

        Post::query()
            ->where('id', '=', $id)
            ->where('user_id', '=', $auth_id)
            ->delete();

        return response()->json([
            'message' => '投稿を削除しました',
        ], 200);
    }
}
