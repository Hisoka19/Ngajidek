<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\RefferalCodeResource\Pages;
use App\Filament\Admin\Resources\RefferalCodeResource\RelationManagers;
use App\Models\RefferalCode;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\ToggleColumn;


class RefferalCodeResource extends Resource
{
    protected static ?string $model = RefferalCode::class;

    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    protected static ?string $navigationGroup = 'Payments Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('code')
                    ->required(),
                Forms\Components\Select::make('discount_type')
                    ->required()
                    ->options([
                        'percentage' => 'Percentage',
                        'fixed' => 'Fixed',
                    ]),
                Forms\Components\TextInput::make('discount')
                    ->required()
                    ->numeric()
                    ->minValue(0),
                Forms\Components\DateTimePicker::make('valid_until')
                    ->required(),
                Forms\Components\Toggle::make('is_used')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\columns\TextColumn::make('code'),
                Tables\columns\TextColumn::make('discount_type'),
                Tables\columns\TextColumn::make('discount'),
                Tables\columns\TextColumn::make('valid_until'),
                Tables\Columns\ToggleColumn::make('is_used'),
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
            'index' => Pages\ListRefferalCodes::route('/'),
            'create' => Pages\CreateRefferalCode::route('/create'),
            'edit' => Pages\EditRefferalCode::route('/{record}/edit'),
        ];
    }
}
