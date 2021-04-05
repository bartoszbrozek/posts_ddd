<?php

namespace App\Presentation\UI\Web\Frontend\Http\Controllers;

use App\Component\Post\Port\Rest\CreatePostAction;
use App\Component\Post\Port\Rest\GetAllPostsAction;
use App\Component\Post\Port\Rest\GetSinglePostAction;
use App\Shared\Infrastructure\Rest\ErrorResponse;
use App\Shared\Infrastructure\Rest\SuccessResponse;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function findOne(string $uuid, GetSinglePostAction $getSinglePostAction)
    {
        try {
            $post = $getSinglePostAction($uuid);
            return SuccessResponse::json($post->toArray());
        } catch (Exception $ex) {
            return ErrorResponse::json($ex->getMessage(), [], 400, $ex);
        }
    }

    public function paginate(GetAllPostsAction $getAllPostsAction, int $number)
    {
        try {
            $posts = $getAllPostsAction()->all();
            return SuccessResponse::json($posts);
        } catch (Exception $ex) {
            return ErrorResponse::json($ex->getMessage());
        }
    }

    public function create(Request $request, CreatePostAction $createPostAction,)
    {
        try {
            $createPostAction($request, \Auth::user());
            return SuccessResponse::json([], 'Post Created Successfully', 201);
        } catch (Exception $ex) {
            return ErrorResponse::json($ex->getMessage());
        }
    }
}
