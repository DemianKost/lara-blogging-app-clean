<?php

namespace Domain\Blogging\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Domain\Blogging\Models\Post;
use Domain\Blogging\ValueObjects\PostValueObject; 

class UpdatePost implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public int $postId,
        public PostValueObject $object
    ) { }

    public function handle(): void
    {
        $post = Post::find( $this->postId );
        $post->update( $this->object->toArray() );
    }
}
