<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;
use App\Models\Series;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    // protected static ?string $modelLabel = 'Artikel';

    public static function getEloquentQuery(): Builder
    {
        return Article::latest('id');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->live()
                            ->debounce(1000)
                            ->afterStateUpdated(function (\Filament\Forms\Set $set, $state) {
                                $set('slug', to_slug($state ?? ''));
                            })
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('slug')
                            ->readOnly()
                            ->required(),
                        Forms\Components\MarkdownEditor::make('content')
                            ->required()
                            ->maxLength(65535),
                    ])
                    ->columnSpan(2),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Thumbnail')
                            ->schema([
                                Forms\Components\FileUpload::make('thumbnail')
                                    ->disk(config('filesystems.default'))
                                    ->directory('artikel/thumbnail')
                                    ->visibility('public')
                                    ->label('')
                                    ->image(),
                            ]),
                        Forms\Components\Section::make('Lain Lain')
                            ->schema([
                                Forms\Components\Select::make('topics')
                                    ->label('Topik')
                                    ->relationship('topics', 'name')
                                    ->preload()
                                    ->searchable()
                                    ->multiple(),
                                Forms\Components\Select::make('series_id')
                                    ->label('Seri')
                                    ->relationship('series', 'title')
                                    ->preload()
                                    ->searchable()
                                    ->live()
                                    ->afterStateUpdated(function (\Filament\Forms\Set $set, $state) {
                                        if ($state !== null) {
                                            $series = Series::find($state);
                                            $episode = $series->articles()->latest()->value('episode') + 1;

                                            $set('episode', $episode);
                                        }
                                    }),
                                Forms\Components\TextInput::make('episode'),
                                Forms\Components\Toggle::make('is_draft')
                                    ->label('Simpan Sebagai Draf'),
                            ]),
                    ])
                    ->columnSpan(1),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Penulis')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->description(fn (Article $record) => $record->series?->title, position: 'above')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->disk(config('filesystems.default')),
                Tables\Columns\ToggleColumn::make('is_draft')
                    ->label('Draf'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
