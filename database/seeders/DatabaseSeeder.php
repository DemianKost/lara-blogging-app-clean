<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\DefaultUserSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(
            class: DefaultUserSeeder::class
        );
    }
}
