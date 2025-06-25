<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Page;
use Filament\Forms;
use Illuminate\Support\Facades\Password;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;

class ForgotPassword extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static ?string $title = 'Lupa Password';
    protected static ?string $navigationLabel = null; // tidak muncul di sidebar
    protected static string $view = 'filament.pages.forgot-password';

    public ?string $email = '';

    public function mount(): void
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('email')
                ->label('Email')
                ->email()
                ->required(),
        ];
    }

    public function submit()
    {
        $status = Password::sendResetLink(['email' => $this->email]);

        if ($status === Password::RESET_LINK_SENT) {
            Notification::make()
                ->title('Tautan reset password telah dikirim ke email kamu.')
                ->success()
                ->send();
        } else {
            Notification::make()
                ->title('Email tidak ditemukan atau gagal mengirim.')
                ->danger()
                ->send();
        }

    }
}
