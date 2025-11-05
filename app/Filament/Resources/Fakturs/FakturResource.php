<?php

namespace App\Filament\Resources\Fakturs;

use App\Filament\Resources\Fakturs\Pages\CreateFaktur;
use App\Filament\Resources\Fakturs\Pages\EditFaktur;
use App\Filament\Resources\Fakturs\Pages\ListFakturs;
use App\Filament\Resources\Fakturs\Pages\ViewFaktur;
use App\Filament\Resources\Fakturs\Schemas\FakturForm;
use App\Filament\Resources\Fakturs\Schemas\FakturInfolist;
use App\Filament\Resources\Fakturs\Tables\FaktursTable;
use App\Models\Faktur;
use App\Models\FakturModel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FakturResource extends Resource
{
    protected static ?string $model = FakturModel::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ReceiptPercent;
      protected static ?string $label = 'Faktur';
    protected static ?string $pluralLabel = 'Kelola Faktur';

    public static function form(Schema $schema): Schema
    {
        return FakturForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return FakturInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FaktursTable::configure($table);
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
            'index' => ListFakturs::route('/'),
            'create' => CreateFaktur::route('/create'),
            'view' => ViewFaktur::route('/{record}'),
            'edit' => EditFaktur::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
