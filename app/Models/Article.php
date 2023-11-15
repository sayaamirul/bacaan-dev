<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    public function topics(): BelongsToMany
    {
        return $this->morphToMany(Topic::class, 'topicable');
    }

    public function series(): BelongsTo
    {
        return $this->belongsTo(Series::class);
    }

    public function commentableName(): string
    {
        return 'article';
    }

    public function commentUrl(): string
    {
        return 'komentar';
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('published_at', '!=', null)
            ->where('is_draft', false);
    }

    public function scopeSeriesEpisode(Builder $query, int $seriesId, int $episode): Builder
    {
        return $query->where('series_id', $seriesId)
            ->where('episode', $episode);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function views(): HasMany
    {
        return $this->hasMany(ArticleView::class);
    }
}
