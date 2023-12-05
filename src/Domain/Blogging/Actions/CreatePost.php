<?php

declare(strict_types=1);

namespace Domain\Blogging\Actions;

use Domain\Blogging\Models\Post;
use Domain\Blogging\ValueObjects\PostValueObject;

class CreatePost
{
    public static function handle( PostValueObject $object ): Post
    {
        return Post::create($object->toArray());
    }
}