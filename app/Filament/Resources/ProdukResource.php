<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Produk;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Actions\ViewAction;
use Filament\Resources\Resource;
use Filament\Support\Enums\MaxWidth;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Pages\Actions\EditAction;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProdukResource\Pages;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;


// use Filament\Forms\Components\Select;

class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';
    protected static ?string $navigationLabel = 'Data Produk';
    protected static ?string $label = 'Produk';
    protected static ?string $navigationGroup = 'Management Data Produk';
    protected static ?string $slug = 'Data Produk';

    // protected static ?int $navigationSort = ;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_produk')
                ->label('Nama Produk')
                ->placeholder('Isi Nama Produk')
                ->required()
                ->maxLength(255)
                ->live(onBlur: true)
                ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                ->columnSpan([
                    'default' => 2,
                    'sm' => 2,
                    'md' => 1
                ]),

                TextInput::make('slug')
                ->required()
                ->readOnly()
                ->placeholder('Slug akan diisi otomatis setelah mengisi nama produk')
                ->maxLength(255)
                ->columnSpan([
                    'default' => 2,
                    'sm' => 2,
                    'md' => 1
                ]),

                Select::make('kategori')
                    ->options([
                        'Fisik' => 'Fisik',
                        'Non-fisik' => 'Non-fisik',
                    ])
                    ->columnSpan([
                        'default' => 2,
                        'sm' => 2,
                        'md' => 1
                    ]),

                    TextInput::make('harga')
                    ->label('Harga Produk (Rupiah)')
                    ->placeholder('Isi Harga Produk (Rupiah)')
                    ->required()
                    ->integer()
                    ->maxLength(255)
                    ->columnSpan([
                        'default' => 2,
                        'sm' => 2,
                        'md' => 1
                    ]),

                    TextInput::make('berat')
                    ->label('Bobot Berat Per Gram')
                    ->placeholder('Isi Bobot Berat Per Gram')
                    ->required()
                    ->integer()
                    ->maxLength(255)
                    ->columnSpan([
                        'default' => 2,
                        'sm' => 2,
                        'md' => 1
                    ]),

                    TextInput::make('stock')
                    ->label('Stok Produk')
                    ->placeholder('Isi Stok Produk')
                    ->required()
                    ->integer()
                    ->maxLength(255)
                    ->columnSpan([
                        'default' => 2,
                        'sm' => 2,
                        'md' => 1
                    ]),

                    Repeater::make('photos')
                    ->relationship('photos')
                    ->schema([
                        FileUpload::make('path')
                        ->label('Foto')
                        ->required()
                        ->image()
                        ->imageEditor()
                        ->maxSize(2048)
                        ->helperText('Accepts image files up to 2MB only.')
                        ->rules('mimes:jpeg,png,jpg,gif')
                        ->imageCropAspectRatio('1:1')
                        ->directory('product-photos'),
                    ])
                    ->label('Foto Produk')
                    ->grid([
                        'sm' => 2,
                        'md' => 3,
                        'lg' => 4,
                    ])
                    ->columnSpanFull()
                    ->required(),


                    RichEditor::make('deskripsi')
                    ->label('Deskripsi Produk')
                    // ->rows(10)
                    // ->cols(20)
                    ->minLength(2)
                    ->maxLength(1024)
                    ->columnSpanFull(),

                    Toggle::make('is_active')
                    ->label('Active')
                    ->offColor('danger')
                    ->onColor('success')
                    ->accepted()
                    ->default(true)
                    ->columnSpanFull()
                    ->onIcon('heroicon-m-check'),
            ]);


    }

    public static function table(Table $table): Table
    {
        return $table
            ->filtersFormWidth(MaxWidth::FourExtraLarge)
            ->query(Produk::latest())
            ->emptyStateIcon('heroicon-o-archive-box-x-mark')
            ->emptyStateHeading('Tidak Ada Data')
            ->emptyStateDescription('Buat data Produk pertama anda di sini.')
            ->columns([
                ImageColumn::make('photos.path')->label('Foto Produk')
                ->circular()
                ->stacked()
                ->limit(3),
                TextColumn::make('nama_produk')->label('Nama Produk')->searchable(),
                TextColumn::make('harga')->label('Harga Produk')->money('IDR'),
                TextColumn::make('berat')->label('berat')->suffix('Gram'),
                TextColumn::make('stock')->label('Stok')->suffix('pcs'),
                ])



            ->filters([
                Tables\Filters\TrashedFilter::make(),

                SelectFilter::make('kategori')
                ->options([
                    'Fisik' => 'Fisik',
                    'Non-fisik' => 'Non-fisik',
                ])
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListProduks::route('/'),
            'create' => Pages\CreateProduk::route('/create'),
            'view' => Pages\ViewProduk::route('/{record}'),
            'edit' => Pages\EditProduk::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,

            ]);
    }
}
