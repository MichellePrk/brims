<?php

namespace App\Filament\App\Pages;

use Filament\Auth\Pages\EditProfile as BaseEditProfile;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EditProfile extends BaseEditProfile
{
    // protected string $view = 'filament.pages.profile';
    #[\Override]
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('avatar_url')
                    ->label('Avatar')
                    ->image()
                    ->avatar()
                    ->imageEditor()
                    ->disk('public')
                    ->directory('avatars')
                    ->maxSize(1024)
                    ->moveFiles()
                    ->visibility('public'),
                TextInput::make('firstname')
                    ->required()
                    ->autocomplete()
                    ->autofocus(),
                TextInput::make('lastname')
                    ->required()
                    ->autocomplete(),
                TextInput::make('telephone')
                    ->tel()
                    ->telRegex('/^\+\d{2} \(\d{2}\) \d{3}-\d{4}$/')
                    ->mask('+99 (99) 999-9999')
                    ->maxLength(20),
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
            ]);
    }
}
