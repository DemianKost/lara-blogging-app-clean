<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Posts\UpdateRequest;
use App\Http\Resources\Api\V1\PostResource;
use Domain\Blogging\Models\Post;
use Domain\Blogging\Actions\UpdatePost as UpdatePostAction;
use Domain\Blogging\Factories\PostFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Domain\Blogging\Jobs\UpdatePost;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Post $post): Response
    {
        UpdatePost::dispatch(
            $post->id,
            PostFactory::create(
                attributes: $request->validated()
            )
        );

        return response(
            content: null,
            status: 202
        );
    }
}
