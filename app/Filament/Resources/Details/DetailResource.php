<?php

namespace App\Filament\Resources\Details;

use App\Filament\Resources\Details\Pages\CreateDetail;
use App\Filament\Resources\Details\Pages\EditDetail;
use App\Filament\Resources\Details\Pages\ListDetails;
use App\Filament\Resources\Details\Pages\ViewDetail;
use App\Filament\Resources\Details\Schemas\DetailForm;
use App\Filament\Resources\Details\Schemas\DetailInfolist;
use App\Filament\Resources\Details\Tables\DetailsTable;
use App\Models\Detail;
use App\Models\DetailFakturModel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DetailResource extends Resource
{
    protected static ?string $model = DetailFakturModel::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return DetailForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return DetailInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DetailsTable::configure($table);
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
            'index' => ListDetails::route('/'),
            'create' => CreateDetail::route('/create'),
            'view' => ViewDetail::route('/{record}'),
            'edit' => EditDetail::route('/{record}/edit'),
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
