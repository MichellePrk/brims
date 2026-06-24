<?php

namespace App\Filament\Project\Resources\StorageAllocations;

use App\Filament\Project\Resources\StorageAllocations\Pages\AllocateStorage;
use App\Filament\Project\Resources\StorageAllocations\Pages\ManageStorageAllocations;
use App\Models\StorageAllocation;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class StorageAllocationResource extends Resource
{
    #[\Override]
    protected static ?string $model = StorageAllocation::class;

    #[\Override]
    public static ?int $navigationSort = 7;

    #[\Override]
    protected static ?string $navigationLabel = 'Specimen Storage';

    #[\Override]
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedArchiveBoxArrowDown;

    #[\Override]
    protected static ?string $modelLabel = 'Specimen Storage Allocation';

    #[\Override]
    protected static ?string $recordTitleAttribute = 'created_at';

    #[\Override]
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('storageDestination')
                    ->required(),
            ]);
    }

    #[\Override]
    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('created_at')
            ->columns([
                TextColumn::make('id')
                    ->label('ID'),
                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('user.full_name')
                    ->searchable(['firstname', 'lastname']),
                TextColumn::make('storageDestination')
                    ->searchable(),
                TextColumn::make('storage_logs_count')
                    ->label('Specimens Allocated')
                    ->counts('storageLogs'),
                TextColumn::make('updated_at')
                    ->dateTime('Y-m-d H:i:s')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                // EditAction::make(),
                // DeleteAction::make(),
                Action::make('Print')
                    ->url(fn(StorageAllocation $record): string => route('storage-allocation-report', ['storageAllocation' => $record->id]))
                    ->icon(Heroicon::OutlinedPrinter)
                    ->openUrlInNewTab(),
            ])
            ->toolbarActions([
                // BulkActionGroup::make([
                //     DeleteBulkAction::make(),
                // ]),
            ]);
    }

    #[\Override]
    public static function getPages(): array
    {
        return [
            'index' => ManageStorageAllocations::route('/'),
            'allocate' => AllocateStorage::route('/allocate'),
        ];
    }
}
