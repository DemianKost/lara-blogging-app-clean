<?php

namespace App\Http\Controllers\Api\V1\Posts;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\PostResource;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        return PostResource::collection( Post::all() );
    }
}
