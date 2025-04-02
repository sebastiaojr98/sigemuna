<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TwoFactoryVerify extends Component
{
    public $phone, $two_factory_code, $phoneHide;

    public function mount()
    {
        if(!session()->has('two_factory_phone')):
            return redirect()->intended(route('logout'));
        endif;

        $this->phone = session('two_factory_phone');
        $this->hiddenPhone($this->phone);
    }


    public function render()
    {
        return view('livewire.two-factory-verify')->layout('components.layouts.auth');
    }

    public function verifyCode()
    {
        $user = User::where('phone', $this->phone)->first();

        if(!$user || $user->two_factory_code !== $this->two_factory_code):
            session()->flash('error', 'O código digitado é inválido');
            return;
        endif;

        if(now()->greaterThan($user->two_factory_expires_at)):
            $user->generateTwoFactoryCode();
            session()->flash('error', 'O código digitado expirou');
            return;
        endif;

        $user->resetTwoFactoryCode();
        Auth::login($user);
        session()->forget('two_factory_phone');

        foreach (auth()->user()->roles as $key => $role) {
            switch ($role->name) {
                case 'admin':
                    return redirect()->intended(route('dashboard-infrastructure'));
                break;
                case 'sanitation technique':
                    return redirect()->intended(route('dashboard-infrastructure'));
                break;
                case 'finance technique':
                    return redirect()->intended(route('dashboard-finance'));
                break;
                default:
                    return redirect()->intended(route('profile'));
                break;
            }
        }
    }

    public function hiddenPhone($phone)
    {
        preg_match('/^\+258(\d{2})(\d{4})(\d{3})$/', $phone, $matches);
        $this->phoneHide = $matches[1] . "****" . $matches[3];
    }
}