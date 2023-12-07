<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Posts\StoreRequest;
use App\Jobs\Posts\CreatePost;
use Domain\Blogging\Factories\PostFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request): Response
    {
        // authorize $this->authorise('create', Post::class);
        CreatePost::dispatch(
            PostFactory::create(
                attributes: $request->validated()
            )
        );

        return response()->json(
            data: 'Send it',
            status: 201
        );
    }
}
