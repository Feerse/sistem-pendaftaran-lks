<?php

namespace App\Filament\Sekolah\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\DaftarLomba;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Sekolah\Resources\DaftarLombaResource\Pages;
use App\Filament\Sekolah\Resources\DaftarLombaResource\RelationManagers;

class DaftarLombaResource extends Resource
{
    protected static ?string $model = DaftarLomba::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $slug = 'daftar-lomba';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_sekolah')
                    ->label('Sekolah')
                    ->options([
                        Auth::user()->id => Auth::user()->nama_sekolah
                    ])
                    ->default(Auth::user()->id)
                    ->selectablePlaceholder(false)
                    ->required(),
                Forms\Components\Select::make('id_bidang_mata_lomba')
                    ->label('Bidang Mata Lomba')
                    ->relationship('bidang_mata_lomba', 'nama_bidang_mata_lomba')
                    ->required(),
                Forms\Components\Select::make('id_siswa')
                    ->label('Siswa')
                    ->options(function () {
                        return \App\Models\Siswa::where('id_sekolah', Auth::user()->id)
                            ->pluck('nama_siswa', 'id');
                    })
                    ->required(),
                Forms\Components\Select::make('id_guru')
                    ->label('Guru')
                    ->options(function () {
                        return \App\Models\Guru::where('id_sekolah', Auth::user()->id)
                            ->pluck('nama_guru', 'id');
                    })
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sekolah.nama_sekolah')
                    ->sortable(),
                Tables\Columns\TextColumn::make('bidang_mata_lomba.nama_bidang_mata_lomba')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('siswa.nama_siswa')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('guru.nama_guru')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListDaftarLombas::route('/'),
            'create' => Pages\CreateDaftarLomba::route('/create'),
            'edit' => Pages\EditDaftarLomba::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();
        return $query->where('id_sekolah', Auth::user()->id);
    }
}
