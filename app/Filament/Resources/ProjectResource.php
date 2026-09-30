<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Judul Proyek')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('label')
                    ->label('Label')
                    ->default('PROJECT')
                    ->required(),
                Forms\Components\TagsInput::make('technologies')
                    ->label('Teknologi (Ketik lalu tekan Enter)')
                    ->placeholder('Tambah teknologi (Contoh: Laravel, MySQL)')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->label('Deskripsi Proyek')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('link')
                    ->label('Link Proyek / GitHub')
                    ->nullable()
                    ->url(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul Proyek')
                    ->searchable(),
                Tables\Columns\TextColumn::make('label')
                    ->label('Label'),
                Tables\Columns\TagsColumn::make('technologies')
                    ->label('Teknologi'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
