<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Review;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Notifications\Actions\ActionGroup;
use App\Filament\Resources\ReviewResource\Pages;
use Filament\Pages\Actions\Modal\Actions\Action;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ReviewResource\RelationManagers;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationGroup = 'Management Data Order';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);


    }

    public static function table(Table $table): Table
    {
        return $table
        ->query(Review::latest())
        ->emptyStateIcon('heroicon-o-x-mark')
        ->emptyStateHeading('Tidak Ada Data')
        ->emptyStateDescription('Tunggu Review pertama anda di sini.')
        ->columns([
                TextColumn::make('review')->label('Review User')->searchable(),
                TextColumn::make('reply')->label('Balasan Admin')->searchable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('reply')
                ->form([
                    TextInput::make('reply'),
                ]),
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
            'index' => Pages\ManageReviews::route('/'),
        ];
    }
}
