<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SnippetItem extends Model
{
    use HasFactory, SoftDeletes;

    public function snippet(): BelongsTo
    {
        return $this->belongsTo(Snippet::class);
    }
}
