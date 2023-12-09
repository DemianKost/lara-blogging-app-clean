<?php

namespace App\Http\Controllers\Api\V1\Posts;

use App\Http\Controllers\Controller;
use Domain\Blogging\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Domain\Blogging\Jobs\DeletePost as DeletePostJob;

class DeleteController extends Controller
{
    public function __invoke(Request $request, Post $post): Response
    {
        DeletePostJob::dispatch(
            $post
        );

        return response(
            content: null,
            status: 202
        );
    }
}
