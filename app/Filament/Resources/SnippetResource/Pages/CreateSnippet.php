<?php

namespace App\Filament\Resources\SnippetResource\Pages;

use App\Filament\Resources\SnippetResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateSnippet extends CreateRecord
{
    protected static string $resource = SnippetResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::id();

        return $data;
    }
}
