<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Posts;

use Domain\Blogging\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\PostResource;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Spatie\QueryBuilder\QueryBuilder;

class ShowController extends Controller
{
    public function __invoke(Request $request, Post $post): JsonResponse
    {
        $post = QueryBuilder::for(
            subject: $post
        )->allowedIncludes(
            includes: ['user']
        )->first();

        return response()->json(
            data: new PostResource(
                resource: $post
            ),
            status: 200
        );
    }
}
