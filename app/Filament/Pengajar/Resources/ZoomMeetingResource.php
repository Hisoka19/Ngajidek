<?php

namespace App\Filament\Pengajar\Resources;

use App\Filament\Pengajar\Resources\ZoomMeetingResource\Pages;
use App\Models\ZoomMeeting;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;

class ZoomMeetingResource extends Resource
{
    protected static ?string $model = ZoomMeeting::class;

    protected static ?string $navigationIcon = 'heroicon-o-video-camera';
    protected static ?string $navigationLabel = 'Zoom Meeting';
    protected static ?string $navigationGroup = 'Kelas Saya';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('course_id')
                    ->relationship('course', 'name')
                    ->required(),
                Forms\Components\DateTimePicker::make('start_time')
                    ->required(),
                Forms\Components\TextInput::make('zoom_meeting_id')
                    ->label('Zoom Meeting ID'),
                Forms\Components\TextInput::make('join_url')
                    ->label('Join URL'),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('course.name')->label('Kelas'),
                Tables\Columns\TextColumn::make('start_time')->label('Waktu Mulai'),
                Tables\Columns\TextColumn::make('zoom_meeting_id')->label('Meeting ID'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make('join_zoom')
                    ->label('Masuk Zoom')
                    ->url(fn ($record) => $record->join_url)
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-video-camera')
                    ->visible(fn ($record) => $record->join_url !== null),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListZoomMeetings::route('/'),
            'create' => Pages\CreateZoomMeeting::route('/create'),
            'edit' => Pages\EditZoomMeeting::route('/{record}/edit'),
        ];
    }
}
