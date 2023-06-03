<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class LoginPage extends Component
{
    public function render()
    {
        return view('livewire.login-page')->extends('app')->section('content');
    }

    public $username, $password;

    public function login()
    {
        $user = User::where('username', $this->username)->first();
        if ($user) {
            if (Hash::check($this->password, $user->password)) {
                if ($user->isaktif) {
                    auth()->login($user, true);
                    redirect('/');
                }else{
                    session()->flash('alert', 'Akun tidak aktif');
                }
            }else{
                session()->flash('alert', 'Password salah');
            }
        }else{
            session()->flash('alert', 'username tidak ditemukan');
        }
    }
}
