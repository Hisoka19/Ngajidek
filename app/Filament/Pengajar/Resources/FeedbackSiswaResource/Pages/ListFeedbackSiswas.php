<?php

namespace App\Filament\Pengajar\Resources\FeedbackSiswaResource\Pages;

use App\Filament\Pengajar\Resources\FeedbackSiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFeedbackSiswas extends ListRecords
{
    protected static string $resource = FeedbackSiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
