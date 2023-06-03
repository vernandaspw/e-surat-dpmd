<?php

namespace App\Http\Livewire;

use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use App\Models\User;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $this->akuns = User::get();
        $this->suratMasuks = SuratMasuk::get();
        $this->suratKeluars = SuratKeluar::get();


        return view('livewire.home')->extends('app')->section('content');
    }
}
