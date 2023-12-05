<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Posts\StoreRequest;
use Domain\Blogging\Actions\CreatePost;
use Domain\Blogging\Factories\PostFactory;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        // authorize $this->authorise('create', Post::class);

        $post = CreatePost::handle(
            object: PostFactory::create(
                attributes: $request->validated()
            )
        ); 
        
        return response()->json(
            data: $post,
            status: 201
        );
    }
}
