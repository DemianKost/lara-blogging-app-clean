<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DefaultUserSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        User::factory()->create([
            'first_name' => 'Mike',
            'last_name' => 'Jordan',
            'email' => 'test@example.com'
        ]);
    }
}
