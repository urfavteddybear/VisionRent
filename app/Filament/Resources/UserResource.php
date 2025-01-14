<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\ViewField;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationGroup = "Management";

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Informasi Dasar')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Nama')
                        ->required(),
                    Forms\Components\TextInput::make('email')
                        ->label('Email')
                        ->email()
                        ->required(),
                    Forms\Components\TextInput::make('password')
                        ->label('Password')
                        ->password()
                        ->minLength(8)
                        ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                        ->dehydrated(fn ($state) => filled($state))
                        ->required(fn ($livewire) => $livewire instanceof Pages\CreateUser),
                    Forms\Components\Select::make('role')
                        ->label('Role')
                        ->options([
                            'admin' => 'Admin',
                            'customer' => 'Customer',
                        ])
                        ->default('customer'),
                ])->columns(2),

            Forms\Components\Section::make('Data Verifikasi')
                ->schema([
                    Forms\Components\TextInput::make('full_name')
                        ->label('Nama Lengkap (KTP)')
                        ->disabled(),
                    Forms\Components\TextInput::make('nik')
                        ->label('NIK')
                        ->disabled(),
                    Forms\Components\TextInput::make('phone')
                        ->label('Nomor Telepon')
                        ->disabled(),
                    Forms\Components\Textarea::make('address')
                        ->label('Alamat')
                        ->disabled(),
                    Forms\Components\TextInput::make('verification_status')
                        ->label('Status Verifikasi')
                        ->disabled(),
                    ViewField::make('ktp_preview')
                        ->view('filament.forms.components.ktp-preview')
                        ->visible(fn ($record) => $record && $record->ktp_path)
                ])->columns(2)
                ->visible(fn ($record) => $record && $record->verification_status !== 'unverified'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('name')
                ->label('Nama')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('email')
                ->label('Email')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('role')
                ->label('Role')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'admin' => 'primary',
                    'customer' => 'success',
                    default => 'gray',
                })
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('verification_status')
                ->label('Status Verifikasi')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'verified' => 'success',
                    'pending' => 'warning',
                    'rejected' => 'danger',
                    'unverified' => 'gray',
                })
                ->formatStateUsing(fn (string $state): string => match ($state) {
                    'verified' => 'Terverifikasi',
                    'pending' => 'Menunggu Verifikasi',
                    'rejected' => 'Ditolak',
                    'unverified' => 'Belum Verifikasi',
                    default => $state,
                }),
        ])
        ->actions([
            Action::make('verify')
                ->label('Verifikasi')
                ->icon('heroicon-o-check')
                ->color('success')
                ->action(function (User $user) {
                    $user->update([
                        'verification_status' => 'verified'
                    ]);
                    $user->notify(new \App\Notifications\VerificationResultNotification(true));
                })
                ->requiresConfirmation()
                ->modalHeading('Verifikasi User')
                ->modalSubheading('Apakah Anda yakin ingin memverifikasi user ini?')
                ->modalButton('Ya, Verifikasi')
                ->visible(fn (User $user) => $user->verification_status === 'pending'),

            Action::make('reject')
                ->label('Tolak')
                ->icon('heroicon-o-x-mark')
                ->color('danger')
                ->form([
                    Forms\Components\Textarea::make('rejection_reason')
                        ->label('Alasan Penolakan')
                        ->required()
                        ->maxLength(500),
                ])
                ->action(function (User $user, array $data) {
                    $user->update([
                        'verification_status' => 'rejected',
                        'rejection_reason' => $data['rejection_reason']
                    ]);
                    $user->notify(new \App\Notifications\VerificationResultNotification(false, $data['rejection_reason']));
                })
                ->requiresConfirmation()
                ->modalHeading('Tolak Verifikasi')
                ->modalSubheading('Harap berikan alasan penolakan yang jelas')
                ->modalButton('Tolak Verifikasi')
                ->visible(fn (User $user) => $user->verification_status === 'pending'),

            Tables\Actions\ViewAction::make()
                ->color('gray'),

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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }


    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->latest();
    }
}
