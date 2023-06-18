<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlayerResource\Pages;
use App\Filament\Resources\PlayerResource\RelationManagers;
use Filament\Forms\Components\Select;
use App\Models\Player;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;

class PlayerResource extends Resource
{
    protected static ?string $model = Player::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'Játékosok';

    protected static ?string $pluralModelLabel  = 'Játékosok';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('team_id')
                    ->label("Csapatnév")
                    ->required()
                    ->relationship('team', 'name'),
                Forms\Components\TextInput::make('name')
                    ->label("Játékos neve")
                    ->required()
                    ->maxLength(255),
                FileUpload::make('avatar')
                    ->panelAspectRatio('2:1')
                    ->directory('players')
                    ->storeFileNamesIn('original_filename')
                    ->image()
                    ->label('Kép kiválasztása')
                    ->placeholder('Húzd ide a képet vagy klikkelj ide')
                    ->required(),
                Forms\Components\TextInput::make('position')
                    ->label("Pozíció")
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('team.name')->label('Csapatnév')->sortable(),
                Tables\Columns\TextColumn::make('name')->label('Játékos neve')->sortable()->searchable(),
                ImageColumn::make('avatar')->label('Profikép'),
                Tables\Columns\TextColumn::make('position')->label('Poyíció'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()->modalHeading('Játékos(ok) törlése'),
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
            'index' => Pages\ListPlayers::route('/'),
            'create' => Pages\CreatePlayer::route('/create'),
            'edit' => Pages\EditPlayer::route('/{record}/edit'),
        ];
    }
}
