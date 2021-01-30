<?php

namespace App\Presentation\UI\Web\Frontend\Http\Controllers;

use App\Infrastructure\Component\MainPage\Post\PostService;

class PostController extends Controller
{
    public function index()
    {
        $posts = ['test1', 'test2',];
        return view('post/index', [
            'posts' => $posts,
        ]);
    }

    public function post(int $id, PostService $postService)
    {
        $post = $postService->findById($id);

        return view('post/single_post', [
            'post' => $post,
        ]);
    }
}
