<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ItemResource\Pages;
use App\Filament\Resources\ItemResource\RelationManagers;
use App\Models\Item;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ItemResource extends Resource
{
    protected static ?string $model = Item::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->label('Nama Item')
                ->required(),
            Forms\Components\Select::make('category_id')
                ->label('Kategori')
                ->relationship('category', 'name')
                ->required(),
            Forms\Components\TextInput::make('stock')
                ->label('Stok')
                ->numeric()
                ->required(),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('name')
                ->label('Nama Item')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('category.name')
                ->label('Kategori')
                ->sortable(),
            Tables\Columns\TextColumn::make('stock')
                ->label('Stok')
                ->sortable(),
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
            'index' => Pages\ListItems::route('/'),
            'create' => Pages\CreateItem::route('/create'),
            'edit' => Pages\EditItem::route('/{record}/edit'),
        ];
    }
}
