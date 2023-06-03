<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SuratKeluarPage extends Component
{
    public function render()
    {
        return view('livewire.surat-keluar-page')->extends('app')->section('content');
    }
}
