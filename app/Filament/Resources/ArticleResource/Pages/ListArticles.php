<?php

namespace App\Filament\Resources\ArticleResource\Pages;

use App\Filament\Resources\ArticleResource;
use App\Models\Article;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListArticles extends ListRecords
{
    protected static string $resource = ArticleResource::class;

    public function getTabs(): array
    {
        return [
            'Diterbitkan' => Tab::make('Diterbitkan')
                ->modifyQueryUsing(fn (Builder $query) => $query->published())
                ->badge(Article::query()->published()->count()),
            'Draf' => Tab::make('Draf')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('is_draft', true))
                ->badge(Article::query()->where('is_draft', true)->count()),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
