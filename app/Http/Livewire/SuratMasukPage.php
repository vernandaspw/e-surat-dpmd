<?php

namespace App\Http\Livewire;

use App\Models\SuratMasuk;
use Livewire\Component;
use Livewire\WithFileUploads;

class SuratMasukPage extends Component
{
    use WithFileUploads;

    public function render()
    {
        $this->datas = SuratMasuk::get();

        return view('livewire.surat-masuk-page')->extends('app')->section('content');
    }

    public function status($id)
    {
        $data = User::find($id);

        $data->update([
            'isaktif' => $data->isaktif ? false : true,
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

    public $no_surat, $tgl_surat_masuk, $asal_surat, $perihal, $lampiran, $penerima, $tgl_terima, $is_disposisi, $tgl_disposisi, $keterangan_disposisi, $is_tolak, $keterangan_tolak, $kepentingan;

    public function resetData()
    {
        $this->no_surat = null;
        $this->tgl_surat_masuk = null;
        $this->asal_surat = null;
        $this->perihal = null;
        $this->lampiran = null;
        $this->penerima = null;
        $this->tgl_terima = null;
        $this->is_disposisi = null;
        $this->tgl_disposisi = null;
        $this->keterangan_disposisi = null;
        $this->is_tolak = null;
        $this->keterangan_tolak = null;
        $this->kepentingan = null;
    }

    public function simpan()
    {

        if ($this->lampiran) {
            $lampiran = $this->lampiran->store('lampiran');
        }

        SuratMasuk::create([
            'user_id' => auth()->user()->id,
            'no_surat' => $this->no_surat,
            'tgl_surat_masuk' => $this->tgl_surat_masuk,
            'asal_surat' => $this->asal_surat,
            'perihal' => $this->perihal,
            'bagian' => auth()->user()->bagian ? auth()->user()->bagian : null,
            'lampiran' => $lampiran,
            'penerima' => $this->penerima,
            'tgl_terima' => $this->tgl_terima,
            'is_disposisi' => $this->is_disposisi,
            'tgl_disposisi' => $this->tgl_disposisi,
            'keterangan_disposisi' => $this->keterangan_disposisi,
            'is_tolak' => $this->is_tolak,
            'keterangan_tolak' => $this->keterangan_tolak,
            'kepentingan' => $this->kepentingan,
        ]);

        session()->flash('alertSuccess', 'berhasil buat data');

        $this->buatPage = false;
        $this->resetData();

    }


    public function terimaSurat($id)
    {

        $d = SuratMasuk::find($id);
        $d->update([
            'penerima' => auth()->user()->nama,
            'tgl_terima' => now(),
        ]);

        session()->flash('alertSuccess', 'berhasil terima surat');

    }

    public function tolak_surat($id)
    {

        $d = SuratMasuk::find($id);
        $d->update([
            'is_tolak' => true,
        ]);

        session()->flash('alertSuccess', 'berhasil tolak surat');

    }

}
