<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AuthorResource\Pages;
use App\Filament\Resources\AuthorResource\RelationManagers;
use App\Models\Author;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AuthorResource extends Resource
{
    protected static ?string $model = Author::class;

    protected static ?string $navigationIcon = 'carbon-group';

    protected static ?string $navigationLabel = 'Author';

    protected static ?string $pluralLabel = 'Authors';

    // protected static ?string $slug ='blogs/authors';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'Blogs';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make('Data')
                ->schema([
                    Forms\Components\TextInput::make('name'),
                    Forms\Components\TextInput::make('email'),
                    Forms\Components\Textarea::make('bio'),
                    Forms\Components\TextInput::make('instagram'),
                    Forms\Components\TextInput::make('twitter')
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('email'),

                Tables\Columns\TextColumn::make('instagram'),

                Tables\Columns\TextColumn::make('twitter'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageAuthors::route('/'),
        ];
    }
}
