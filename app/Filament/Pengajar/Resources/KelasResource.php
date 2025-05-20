<?php

namespace App\Filament\Pengajar\Resources;

use App\Filament\Pengajar\Resources\KelasResource\Pages;
use App\Filament\Pengajar\Resources\KelasResource\RelationManagers;
use App\Models\Kelas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Pengajar\Resources\KelasResource\Pages\ListKelas;
use App\Filament\Pengajar\Resources\KelasResource\Pages\CreateKelas;
use App\Filament\Pengajar\Resources\KelasResource\Pages\EditKelas;


class KelasResource extends Resource
{
    protected static ?string $model = Kelas::class;

    protected static ?string $navigationGroup = 'Kelas';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama'),
            ])
            ->filters([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListKelas::route('/'),
            'create' => CreateKelas::route('/create'),
            'edit' => EditKelas::route('/{record}/edit'),
        ];
    }
}
