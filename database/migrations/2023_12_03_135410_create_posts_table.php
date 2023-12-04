<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Domain\Shared\Models\User;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();

            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->mediumText('body')->nullable();
            $table->text('description')->nullable();

            $table->boolean('published')->default(false);
            $table->foreignIdFor(User::class, 'user_id')->index();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
