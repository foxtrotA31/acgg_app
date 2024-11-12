<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlantCategoryResource\Pages;
use App\Filament\Resources\PlantCategoryResource\RelationManagers;
use App\Models\PlantCategory;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PlantCategoryResource extends Resource
{
    protected static ?string $model = PlantCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-plus';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('pc_name')
                        ->label('Specie Name')
                        ->required(),
                TextInput::make('pc_ideal_moisture')
                        ->label('% Ideal Moisture of the Soil')
                        ->numeric()
                        ->inputMode('decimal')
                        ->minValue(1)
                        ->maxValue(100)
                        ->required(),
                TextInput::make('pc_wilting_point')
                        ->label('% Ideal Soil Moisture for a Plant to Wilt')
                        ->numeric()
                        ->inputMode('decimal')
                        ->minValue(0)
                        ->maxValue(100)
                        ->required(),
                Textarea::make('pc_description')
                        ->label('Description')
                        ->rows(10)
                        ->cols(20)
                        ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('pc_name')->label('Specie Name'),
                TextColumn::make('pc_ideal_moisture')->label('% Ideal Moisture of the Soil'),
                TextColumn::make('pc_wilting_point')->label('% Ideal Soil Moisture for a Plant to Wilt'),
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
            'index' => Pages\ListPlantCategories::route('/'),
            'create' => Pages\CreatePlantCategory::route('/create'),
            'edit' => Pages\EditPlantCategory::route('/{record}/edit'),
        ];
    }
}
