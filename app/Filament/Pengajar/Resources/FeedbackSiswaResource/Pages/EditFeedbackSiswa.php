<?php

namespace App\Filament\Pengajar\Resources\FeedbackSiswaResource\Pages;

use App\Filament\Pengajar\Resources\FeedbackSiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFeedbackSiswa extends EditRecord
{
    protected static string $resource = FeedbackSiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
