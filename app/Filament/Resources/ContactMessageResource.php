<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactMessageResource\Pages;
use App\Models\ContactMessage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ContactMessageResource extends Resource
{
    protected static ?string $model = ContactMessage::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $navigationLabel = 'Pesan Masuk';

    protected static ?string $pluralModelLabel = 'Pesan Masuk';

    /**
     * Menampilkan angka jumlah pesan yang BELUM DIBACA pada sidebar.
     */
    public static function getNavigationBadge(): ?string
    {
        $unreadCount = static::getModel()::where('is_read', false)->count();

        return $unreadCount > 0 ? (string) $unreadCount : null;
    }

    /**
     * Memberikan warna highlight pada badge counter di sidebar.
     */
    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }

    /**
     * Menghilangkan tombol Create karena pesan hanya dikirim dari form kontak frontend.
     */
    public static function canCreate(): bool
    {
        return false;
    }

    /**
     * Skema Form Modal saat melihat detail pesan.
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama Pengirim')
                    ->readOnly(),
                Forms\Components\TextInput::make('email')
                    ->label('Email Pengirim')
                    ->readOnly(),
                Forms\Components\Textarea::make('message')
                    ->label('Isi Pesan')
                    ->readOnly()
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_read')
                    ->label('Sudah Dibaca'),
            ]);
    }

    /**
     * Skema Tabel untuk menampilkan daftar pesan masuk.
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\IconColumn::make('is_read')
                    ->label('Status')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-envelope-open')
                    ->trueColor('success')
                    ->falseColor('warning'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('message')
                    ->label('Pesan')
                    ->limit(50),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Masuk')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->mutateRecordDataUsing(function (array $data, ContactMessage $record): array {
                        // Otomatis tandai sebagai sudah dibaca di database saat modal View dibuka
                        if (! $record->is_read) {
                            $record->update(['is_read' => true]);
                            $data['is_read'] = true;
                        }

                        return $data;
                    }),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    /**
     * Mendaftarkan rute halaman Filament.
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactMessages::route('/'),
        ];
    }
}
