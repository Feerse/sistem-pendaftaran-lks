<?php

namespace App\Filament\Sekolah\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Siswa;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Sekolah\Resources\SiswaResource\Pages;
use App\Filament\Sekolah\Resources\SiswaResource\RelationManagers;
use Symfony\Component\HttpKernel\Exception\HttpException;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;

    protected static ?string $navigationIcon = 'heroicon-s-user-group';

    protected static ?string $slug = 'siswa';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nisn')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_siswa')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('id_sekolah')
                    ->label('Sekolah')
                    ->options([
                        Auth::user()->id => Auth::user()->nama_sekolah
                    ])
                    ->default(Auth::user()->id)
                    ->selectablePlaceholder(false)
                    ->required(),
                Forms\Components\TextInput::make('program_keahlian')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomor_hp')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nisn')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_siswa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sekolah.nama_sekolah')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('program_keahlian')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor_hp')
                    ->searchable(),
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
            'index' => Pages\ListSiswas::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'edit' => Pages\EditSiswa::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();
        return $query->where('id_sekolah', Auth::user()->id);
    }
}
