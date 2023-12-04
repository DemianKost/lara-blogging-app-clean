<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Posts;

use Domain\Blogging\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\PostResource;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class IndexController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        return response()->json(
            data: PostResource::collection(
                resource: Post::published()->paginate(3)
            ),
            status: 200
        );
    }
}
