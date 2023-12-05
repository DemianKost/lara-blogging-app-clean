<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Posts;

use Domain\Blogging\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\PostResource;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Spatie\QueryBuilder\QueryBuilder;

class IndexController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $posts = QueryBuilder::for(
            subject: Post::class
        )->allowedIncludes(
            includes: ['user']
        )->published()->paginate(3);

        return response()->json(
            data: PostResource::collection(
                resource: $posts
            ),
            status: 200
        );
    }
}
