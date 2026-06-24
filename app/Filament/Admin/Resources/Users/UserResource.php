<?php

namespace App\Filament\Admin\Resources\Users;

use App\Filament\Admin\Resources\Users\Pages\CreateUser;
use App\Filament\Admin\Resources\Users\Pages\EditUser;
use App\Filament\Admin\Resources\Users\Pages\ListUsers;
use App\Filament\Admin\Resources\Users\Schemas\UserForm;
use App\Filament\Admin\Resources\Users\Tables\UsersTable;
use App\Models\User;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class UserResource extends Resource
{
    #[\Override]
    protected static ?string $model = User::class;

    #[\Override]
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUsers;

    #[\Override]
    protected static string | UnitEnum | null $navigationGroup = 'User Management';

    #[\Override]
    protected static ?int $navigationSort = 3;

    #[\Override]
    protected static ?string $recordTitleAttribute = 'fullname';

    #[\Override]
    public static function form(Schema $schema): Schema
    {
        return UserForm::configure($schema);
    }

    #[\Override]
    public static function table(Table $table): Table
    {
        return UsersTable::configure($table);
    }

    #[\Override]
    public static function getPages(): array
    {
        return [
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }
}
