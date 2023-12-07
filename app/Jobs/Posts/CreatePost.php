<?php

declare(strict_types=1);

namespace App\Jobs\Posts;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Domain\Blogging\ValueObjects\PostValueObject; 
use Domain\Blogging\Actions\CreatePost as CreatePostAction;

class CreatePost implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public PostValueObject $object
    ) {
        
    }

    public function handle(): void
    {
        CreatePostAction::handle(
            object: $this->object
        );
    }
}
