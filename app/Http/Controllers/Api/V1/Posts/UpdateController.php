<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Posts\UpdateRequest;
use App\Http\Resources\Api\V1\PostResource;
use Domain\Blogging\Models\Post;
use Domain\Blogging\Actions\UpdatePost;
use Domain\Blogging\Factories\PostFactory;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        // authorise

        // update
        $created = UpdatePost::handle(
            object: PostFactory::create(
                attributes: $request->validated()
            ),
            post: $post
        );

        $post->fresh();

        return response()->json(
            data: new PostResource(
                resource: $post
            ),
            status: 201
        );
    }
}
