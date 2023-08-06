<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CoachResource\Pages;
use App\Filament\Resources\CoachResource\RelationManagers;
use App\Models\Coach;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;

class CoachResource extends Resource
{
    protected static ?string $model = Coach::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'Edzők';

    protected static ?string $pluralModelLabel  = 'Edzők';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Edző neve')
                    ->maxLength(255),
                FileUpload::make('avatar')
                    ->panelAspectRatio('2:1')
                    ->directory('coaches')
                    ->storeFileNamesIn('original_filename')
                    ->image()
                    ->label('Kép kiválasztása')
                    ->placeholder('Húzd ide a képet vagy klikkelj ide')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Edző neve')->sortable()->searchable(),
                ImageColumn::make('avatar')->label('Profikép'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()->modalHeading('Edző(k) törlése'),
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
            'index' => Pages\ListCoaches::route('/'),
            'create' => Pages\CreateCoach::route('/create'),
            'edit' => Pages\EditCoach::route('/{record}/edit'),
        ];
    }
}
