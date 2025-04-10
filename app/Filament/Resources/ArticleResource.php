<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use App\Models\CategoryArticle;
use Doctrine\DBAL\Query\Limit;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use function Laravel\Prompts\select;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static?string $modelLabel ="статья";
    protected static?string $pluralModelLabel ="статьи";
    protected static ?string $navigationGroup = "Статьи";
    protected static ?string $navigationLabel = "Статьи";
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Название Урока')
                        ->required(),
                    Forms\Components\Textarea::make('content')
                        ->required()
                        ->columnSpanFull(),
                    Forms\Components\FileUpload::make('image')
                        ->image()
                        ->imageEditor()
                        ->directory('article/images')
                        ->maxFiles(10)
                        ->multiple(),
                    Forms\Components\FileUpload::make('documents')
                        ->acceptedFileTypes([
                            'applicateion/pdf',
                            'application/msword',
                        ])
                        ->directory('article/document')
                        ->maxFiles(5)
                        ->multiple(),
                    ])->columnSpan(2),
                Group::make()->schema([
                    Section::make()->schema([
                        Section::make()->schema([
                            Select::make('category_article_id')
                                ->required()
                                ->preload()
                                ->searchable()
                                ->label('Категория поста')
                                ->relationship('category', 'name')
                        ]),
                        Toggle::make('is_active')
                            ->label('Актвная статья')
                            ->default(true),
                        Toggle::make('is_featured')
                            ->label('Популярная статья')
                            ->default(false),
                        Toggle::make('is_banner')
                            ->label('Статья будет отбражаться в баннере')
                            ->default(false),
                    ]),
                ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category.name')
                    ->numeric()
                    ->label('Категория')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Название статьи'),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Активная статья')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Популярная статья')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_banner')
                    ->label('Отображение в баннере')
                    ->boolean(),
            ])
            ->filters([
                SelectFilter::make('category_article_id')
                    ->label('Фильтр по категории')
                    ->searchable()
                    ->options(CategoryArticle::where('is_active', true)->pluck('name', 'id')),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'view' => Pages\ViewArticle::route('/{record}'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
