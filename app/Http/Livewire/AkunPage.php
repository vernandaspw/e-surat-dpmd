<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AkunPage extends Component
{
    public function render()
    {
        $this->datas = User::get();

        return view('livewire.akun-page')->extends('app')->section('content');
    }

    public function status($id)
    {
        $data = User::find($id);

        $data->update([
            'isaktif' => $data->isaktif ? false : true
        ]);
    }

    public $buatPage = false;
    public function buatPageTrue()
    {
        $this->buatPage = true;
    }
    public function buatPageFalse()
    {
        $this->buatPage = false;
    }

    public $nama, $username, $password, $role, $bagian;

    public function simpan()
    {
        User::create([
            'nama' => $this->nama,
            'username' => $this->username,
            'password' => Hash::make($this->password),
            'role' => $this->role,
            'bagian' => $this->bagian,
        ]);

        session()->flash('alertSuccess', 'berhasil buat data');

        $this->buatPage = false;
        $this->nama = null;
        $this->username = null;
        $this->password = null;
        $this->role = null;
        $this->bagian = null;
    }
}
