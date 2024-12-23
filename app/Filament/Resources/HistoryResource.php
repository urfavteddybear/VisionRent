<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HistoryResource\Pages;
use App\Models\History;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class HistoryResource extends Resource
{
    protected static ?string $model = History::class;

    protected static ?string $navigationGroup = "Transactions";

    protected static ?string $navigationIcon = 'heroicon-s-bars-arrow-down';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Select::make('user_id')
                ->label('Pelanggan')
                ->relationship('user', 'email') // Menggunakan email untuk dropdown
                ->searchable()
                ->required()
                ->disabled(),

            Forms\Components\Select::make('item_id')
                ->label('Barang')
                ->relationship('item', 'name') // Menggunakan nama item
                ->searchable()
                ->required()
                ->disabled(),

            Forms\Components\DatePicker::make('start_date')
                ->label('Tanggal Mulai')
                ->required()
                ->disabled(),

            Forms\Components\DatePicker::make('end_date')
                ->label('Tanggal Selesai')
                ->required()
                ->disabled(),

            Forms\Components\DatePicker::make('return_date')
                ->label('Tanggal Pengembalian')
                ->required()
                ->disabled(),

            Forms\Components\TextInput::make('penalty_total')
                ->label('Total Penalti')
                ->numeric()
                ->prefix('IDR')
                ->disabled(),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('user.email')
                ->label('Pelanggan')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('item.name')
                ->label('Barang')
                ->sortable(),

            Tables\Columns\TextColumn::make('start_date')
                ->label('Tanggal Mulai')
                ->sortable(),

            Tables\Columns\TextColumn::make('end_date')
                ->label('Tanggal Selesai')
                ->sortable(),

            Tables\Columns\TextColumn::make('return_date')
                ->label('Tanggal Pengembalian')
                ->sortable(),

            Tables\Columns\TextColumn::make('penalty_total')
                ->label('Total Penalti')
                ->money('IDR')
                ->sortable(),

            Tables\Columns\TextColumn::make('total_cost')
                ->label('Total Biaya')
                ->money('IDR')
                ->sortable(),
        ]);
    }


    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHistories::route('/'),
            'create' => Pages\CreateHistory::route('/create'),
            'edit' => Pages\EditHistory::route('/{record}/edit'),
        ];
    }
}
