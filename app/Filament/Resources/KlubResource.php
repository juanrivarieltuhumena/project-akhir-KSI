<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KlubResource\Pages;
use App\Models\Klub;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class KlubResource extends Resource
{
    protected static ?string $model = Klub::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';
    protected static ?string $navigationLabel = 'Klubs';
    protected static ?string $pluralModelLabel = 'Klub';
    protected static ?string $navigationGroup = 'Manajemen Klub';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->required()
                    ->label('Nama Klub')
                    ->maxLength(255),

                TextInput::make('kota')
                    ->required()
                    ->label('Kota')
                    ->maxLength(255),

                TextInput::make('tahun_berdiri')
                    ->required()
                    ->numeric()
                    ->label('Tahun Berdiri')
                    ->minValue(1800)
                    ->maxValue(date('Y')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->label('Nama Klub')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('kota')
                    ->label('Kota')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('tahun_berdiri')
                    ->label('Tahun Berdiri')
                    ->sortable(),
            ])
            ->defaultSort('nama');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKlubs::route('/'),
            'create' => Pages\CreateKlub::route('/create'),
            'edit' => Pages\EditKlub::route('/{record}/edit'),
        ];
    }
}
