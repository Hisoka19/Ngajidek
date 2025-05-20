<?php

namespace App\Filament\Pengajar\Resources;

use App\Filament\Pengajar\Resources\FeedbackSiswaResource\Pages;
use App\Filament\Pengajar\Resources\FeedbackSiswaResource\RelationManagers;
use App\Models\FeedbackSiswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FeedbackSiswaResource extends Resource
{
    protected static ?string $model = FeedbackSiswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListFeedbackSiswas::route('/'),
            'create' => Pages\CreateFeedbackSiswa::route('/create'),
            'edit' => Pages\EditFeedbackSiswa::route('/{record}/edit'),
        ];
    }
}
