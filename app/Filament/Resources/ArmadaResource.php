<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArmadaResource\Pages;
use App\Filament\Resources\ArmadaResource\RelationManagers;
use App\Models\Armada;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArmadaResource extends Resource
{
    protected static ?string $model = Armada::class;
    protected static ?string $pluralModelLabel = 'Armada';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('merk')
                    ->required()
                    ->maxLength(30),
                Forms\Components\TextInput::make('nopol')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('thn_beli')
                    ->required()
                    ->numeric(),
                Forms\Components\Textarea::make('deskripsi')
                    ->maxLength(200),
                Forms\Components\TextInput::make('jenis_kendaraan_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('kapasitas_kursi')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('rating')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('merk')->searchable(),
                Tables\Columns\TextColumn::make('nopol')->searchable(),
                Tables\Columns\TextColumn::make('thn_beli'),
                Tables\Columns\TextColumn::make('deskripsi')->limit(30),
                Tables\Columns\TextColumn::make('jenis_kendaraan_id'),
                Tables\Columns\TextColumn::make('kapasitas_kursi'),
                Tables\Columns\TextColumn::make('rating'),
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
            'index' => Pages\ListArmadas::route('/'),
            'create' => Pages\CreateArmada::route('/create'),
            'edit' => Pages\EditArmada::route('/{record}/edit'),
        ];
    }
}
