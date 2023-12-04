<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\DefaultUserSeeder;
use Domain\Shared\Models\User;
use Domain\Blogging\Models\Post;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // $this->call(
        //     class: DefaultUserSeeder::class
        // );

        Post::factory(20)->for(
            User::factory()->create([
                'first_name' => 'Mike',
                'last_name' => 'Jordan',
                'email' => 'test@example.com'
            ])
        )->create();
    }
}
