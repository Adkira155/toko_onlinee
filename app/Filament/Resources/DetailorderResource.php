<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DetailorderResource\Pages;
use App\Filament\Resources\DetailorderResource\RelationManagers;
use App\Models\Detailorder;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DetailorderResource extends Resource
{
    protected static ?string $model = Detailorder::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $navigationLabel = 'Detail Order';
    protected static ?string $label = 'Detail Pemesanan';
    protected static ?string $navigationGroup = 'Management Data Order';
    // protected static ?int $navigationSort = 5;

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
        ->query(Detailorder::latest())
        ->emptyStateIcon('heroicon-o-document-text')
        ->emptyStateHeading('Tidak Ada Data')
        ->emptyStateDescription('Tunggu Pesanan pertama anda di sini.')
            ->columns([
                //
            ])
            ->filters([
                //
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
            'index' => Pages\ListDetailorders::route('/'),
            'create' => Pages\CreateDetailorder::route('/create'),
            'view' => Pages\ViewDetailorder::route('/{record}'),
            'edit' => Pages\EditDetailorder::route('/{record}/edit'),
        ];
    }
}
