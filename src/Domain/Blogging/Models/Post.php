<?php

declare(strict_types=1);

namespace Domain\Blogging\Models;

use Domain\Shared\Models\User;
use Domain\Shared\Models\Concerns\HasKey;
use Domain\Shared\Models\Concerns\HasSlug;
use Domain\Blogging\Models\Builders\PostBuilder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use HasKey;
    use HasSlug;
    use SoftDeletes;

    protected $fillable = [
        'key',
        'title',
        'slug',
        'body',
        'description',
        'published',
        'user_id'
    ];

    protected $casts = [
        'published' => 'boolean'
    ];

    public function getRouteKeyName(): string
    {
        return 'key';
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function newEloquentBuilder( $query ): PostBuilder
    {
        return new PostBuilder( $query );
    }
}
