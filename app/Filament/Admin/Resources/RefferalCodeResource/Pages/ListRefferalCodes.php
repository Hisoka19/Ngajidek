<?php

namespace App\Filament\Admin\Resources\RefferalCodeResource\Pages;

use App\Filament\Admin\Resources\RefferalCodeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRefferalCodes extends ListRecords
{
    protected static string $resource = RefferalCodeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
