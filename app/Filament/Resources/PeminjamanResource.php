<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Peminjaman;
use Filament\Tables\Table;
use Filament\Resources\Resource;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;

use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PeminjamanResource\Pages;
use App\Filament\Resources\PeminjamanResource\RelationManagers;

class PeminjamanResource extends Resource
{
    protected static ?string $model = Peminjaman::class;
    protected static ?string $pluralModelLabel = 'Peminjaman';
    protected static ?string $navigationGroup = 'Transaksi';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_peminjam')->label('nama'),
                TextInput::make('ktp_peminjam')->label('nomor ktp'),
                TextInput::make('keperluan_pinjam')->label('alasan'),
                DatePicker::make('mulai'),
                DatePicker::make('selesai'),
                TextInput::make('biaya')->label('biaya'),
                Select::make('armada_id')->searchable()->preload()->relationship('armada',  'merk'),
                Textarea::make('komentar_peminjam'),
                Select::make('status_pinjam')
                ->options([
                    'Pinjam' => 'Pinjam',
                    'Tersedia' => 'Tersedia',
                ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_peminjam')->label('nama'),
                TextColumn::make('ktp_peminjam')->label('ktp'),
                TextColumn::make('keperluan_pinjam')->label('alasan'),
                TextColumn::make('mulai')->label('mulai')->dateTime('d M Y'),
                TextColumn::make('selesai')->label('selesai')->dateTime('d M Y'),
                TextColumn::make('armada.merk')->label('ulasan'),
                TextColumn::make('komentar_peminjam')->label('ulasan'),

                TextColumn::make('status_pinjam')->label('status'),

                TextColumn::make('status_pinjam')->label('status')->badge()->color('success'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

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
            'index' => Pages\ListPeminjamen::route('/'),
            'create' => Pages\CreatePeminjaman::route('/create'),
            'edit' => Pages\EditPeminjaman::route('/{record}/edit'),
        ];
    }
}
