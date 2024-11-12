<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SensorResource\Pages;
use App\Filament\Resources\SensorResource\RelationManagers;
use App\Models\Sensor;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SensorResource extends Resource
{
    protected static ?string $model = Sensor::class;

    protected static ?string $navigationIcon = 'heroicon-o-signal';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('id')
                        ->label('Sensor ID')
                        ->required(),
                TextInput::make('sensor_type')
                        ->label('Type of Sensor')
                        ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('Sensor ID'),
                TextColumn::make('sensor_type')->label('Type of Sensor'),
                TextColumn::make('ping_status')->label('Ping Status'),
                TextColumn::make('ping_date')->label('Date of Ping'),
                TextColumn::make('created_at')->label('Date Created'),
                TextColumn::make('updated_at')->label('Date Updated'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListSensors::route('/'),
            'create' => Pages\CreateSensor::route('/create'),
        ];
    }
}
