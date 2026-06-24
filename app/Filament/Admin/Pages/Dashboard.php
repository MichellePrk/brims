<?php

namespace App\Filament\Admin\Pages;

use BackedEnum;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Support\Icons\Heroicon;

class Dashboard extends BaseDashboard
{

    #[\Override]
    public static ?int $navigationSort = 0;

    #[\Override]
    public static string | BackedEnum | null $navigationIcon = Heroicon::ComputerDesktop;


    #[\Override]
    public function getColumns(): int | array
    {
        return [
            'default' => 1,
            'xl' => 2,
            '2xl' => 3
        ];
    }
}
