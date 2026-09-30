<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SkillResource\Pages;
use App\Models\Skill;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SkillResource extends Resource
{
    protected static ?string $model = Skill::class;

    protected static ?string $navigationIcon = 'heroicon-o-code-bracket';

    protected static ?string $navigationGroup = 'Portfolio Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->placeholder('Contoh: Laravel, MySQL'),

                Forms\Components\Select::make('category')
                    ->options([
                        'Backend' => 'Backend',
                        'Frontend' => 'Frontend',
                        'Database' => 'Database',
                        'Tools & DevOps' => 'Tools & DevOps',
                    ])
                    ->required(),

                Forms\Components\TextInput::make('percentage')
                    ->numeric()
                    ->default(80)
                    ->minValue(1)
                    ->maxValue(100)
                    ->suffix('%')
                    ->required(),

                Forms\Components\TextInput::make('icon')
                    ->placeholder('Contoh: devicon-laravel-plain / URL Ikon')
                    ->helperText('Nama class ikon atau URL gambar logo skill'),

                Forms\Components\Toggle::make('is_active')
                    ->label('Tampilkan di Website')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('category')->sortable()->badge(),
                Tables\Columns\TextColumn::make('percentage')->suffix('%')->sortable(),
                Tables\Columns\IconColumn::make('is_active')->boolean()->label('Status'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'Backend' => 'Backend',
                        'Frontend' => 'Frontend',
                        'Database' => 'Database',
                        'Tools & DevOps' => 'Tools & DevOps',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSkills::route('/'),
            'create' => Pages\CreateSkill::route('/create'),
            'edit' => Pages\EditSkill::route('/{record}/edit'),
        ];
    }
}
