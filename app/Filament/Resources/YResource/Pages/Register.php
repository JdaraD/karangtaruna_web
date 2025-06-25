<?php
namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;

class Register extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';
    protected static ?string $navigationLabel = 'Registrasi Akun';
    protected static ?string $title = 'Register Akun';
    protected static ?int $navigationSort = 90;

    protected static string $view = 'filament.pages.register';

    public ?string $name = '';
    public ?string $email = '';
    public ?string $password = '';
    public ?string $password_confirmation = '';

    public function mount(): void
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->label('Nama')
                ->required()
                ->maxLength(255),

            TextInput::make('email')
                ->label('Email')
                ->email()
                ->required()
                ->unique(User::class, 'email'),

            TextInput::make('password')
                ->label('Password')
                ->password()
                ->required()
                ->minLength(6)
                ->same('password_confirmation'),

            TextInput::make('password_confirmation')
                ->label('Konfirmasi Password')
                ->password()
                ->required(),
        ];
    }

    public function submit(): void
    {
        $data = $this->form->getState();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Auth::login($user);

        $this->redirect(route('filament.admin.pages.dashboard'));
    }
}
