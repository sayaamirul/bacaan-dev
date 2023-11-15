<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Snippet extends Model
{
    use HasFactory, SoftDeletes;

    public function topics(): BelongsToMany
    {
        return $this->morphToMany(Topic::class, 'topicable');
    }

    public function items(): HasMany
    {
        return $this->hasMany(SnippetItem::class);
    }
}
