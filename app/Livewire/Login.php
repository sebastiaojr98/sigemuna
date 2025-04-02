<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email = "", $password = "";
	
    public function render()
    {
        return view('livewire.login')->layout('components.layouts.auth');
    }
    
    //Autenticar
    public function authenticate()
    {
        $credentials = $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            
            $user = Auth::user();
            $user->generateTwoFactoryCode();

            Auth::logout();

            if($user->two_factory_code):
                session(["two_factory_phone" => $user->phone]);
                return redirect()->intended(route('two-factory-verify'));
            endif;

            
        }else{
            session()->flash('error', trans('messages.failed'));
        }
    }

    //Terminar sessao
    public function logout()
    {
        return auth()->logout();
    }
}
