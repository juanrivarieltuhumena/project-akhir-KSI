<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PemainResource\Pages;
use App\Models\Pemain;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;

class PemainResource extends Resource
{
    protected static ?string $model = Pemain::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Manajemen Klub';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->required()
                    ->label('Nama Pemain'),

                TextInput::make('posisi')
                    ->required()
                    ->label('Posisi'),

                TextInput::make('nomor_punggung')
                    ->required()
                    ->numeric()
                    ->label('Nomor Punggung'),

                Select::make('klub_id')
                    ->relationship('klub', 'nama')
                    ->required()
                    ->label('Klub'),

                Select::make('status')
                    ->required()
                    ->options([
                        'Aktif' => 'Aktif',
                        'Cadangan' => 'Cadangan',
                        'Cedera' => 'Cedera',
                    ])
                    ->label('Status'),

                    TextInput::make('gaji')
                    ->label('Gaji')
                    ->required()
                    ->numeric(),
                
                TextInput::make('kontak')
                    ->label('Kontak')
                    ->required()
                    ->tel(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('posisi'),

                TextColumn::make('nomor_punggung')
                    ->label('No Punggung'),

                TextColumn::make('klub.nama')
                    ->label('Klub')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('status')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('gaji')
                    ->label('Gaji'),

                TextColumn::make('kontak')
                    ->label('Kontak'),
            ]);
    }

    public static function authorizeResource(): bool
{
    return true;
}

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPemains::route('/'),
            'create' => Pages\CreatePemain::route('/create'),
            'edit' => Pages\EditPemain::route('/{record}/edit'),
        ];
    }
}
