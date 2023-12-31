<?php

declare(strict_types=1);

namespace Domain\Blogging\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;
use Domain\Blogging\ValueObjects\PostValueObject; 
use Domain\Blogging\Actions\CreatePost as CreatePostAction;
use Domain\Blogging\Aggregates\PostAggregate;

class CreatePost implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public PostValueObject $object
    ) {
        
    }

    public function handle(): void
    {
        PostAggregate::retrieve(
            uuid: Str::uuid()->toString()
        )->createPost(
            object: $this->object,
            userID: 1
        )->persist();

        // CreatePostAction::handle(
        //     object: $this->object
        // );
    }
}
