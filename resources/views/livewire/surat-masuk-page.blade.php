<div>
    <div class="container-fluid">
        <h1 class="mt-4">Surat Masuk</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Kelola Surat Masuk</li>
        </ol>
        @if (session('alertSuccess'))
            <div class="alert alert-success">
                {{ session('alertSuccess') }}
            </div>
        @endif
        @if (session('alertError'))
            <div class="alert alert-danger">
                {{ session('alertError') }}
            </div>
        @endif
        @if ($buatPage)
            <div class="col-4">
                <div class="card">
                    <div class="card-header">Surat Masuk Baru</div>
                    <div class="card-body">
                        <form wire:submit.prevent="simpan">
                            <div class="mb-2">
                                <div class="">Nomor surat</div>
                                <input required wire:model='no_surat' type="text" class="form-control" maxlength="30"
                                    placeholder="Nomor surat">
                            </div>
                            <div class="mb-2">
                                <div class="">Tanggal surat</div>
                                <input required wire:model='tgl_surat_masuk' type="date" class="form-control"
                                    maxlength="30" placeholder="Tanggal surat">
                            </div>
                            <div class="mb-2">
                                <div class="">Asal surat</div>
                                <input wire:model='asal_surat' type="text" class="form-control" maxlength="30"
                                    placeholder="Asal surat">
                            </div>
                            <div class="mb-2">
                                <div class="">Perihal</div>
                                <input required wire:model='perihal' type="text" class="form-control" maxlength="30"
                                    placeholder="Perihal">
                            </div>
                            <div class="mb-2">
                                <div class="">lampiran</div>
                                <input required wire:model='lampiran' type="file" class="form-control" maxlength="30"
                                    placeholder="lampiran">
                            </div>

                            <div class="mb-2">
                                <div class="">Tingkat Kepentingan</div>
                                <select class="form-control" required wire:model='kepentingan'>
                                    <option value="">Pilih</option>
                                    <option value="biasa">Biasa</option>
                                    <option value="segera">segera</option>
                                </select>
                            </div>

                            <div class="mb-2">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <button wire:click='buatPageFalse' type="button"
                                    class="btn btn-secondary ms-2">Tutup</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class=""> <i class="fas fa-table me-1"></i>
                            Data Surat Masuk</div>
                        <div class="">
                            <button type="button" wire:click='buatPageTrue' class="btn-success btn">Surat Masuk
                                Baru</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table {{-- id="datatablesSimple"  --}} class="table">
                        <thead>
                            <tr>
                                <th>no surat</th>
                                <th>Tanggal surat masuk</th>
                                <th>Asal Surat</th>
                                <th>Perihal</th>
                                <th>Bagian</th>
                                <th>Lampiran</th>
                                <th>kepentingan</th>
                                <th>Dibuat</th>
                                <th>Penerima</th>
                                <th>Status</th>
                                <th></th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <td>{{ $data->no_surat }}</td>
                                    <td>{{ \Carbon\Carbon::parse($data->tgl_surat_masuk)->isoFormat('D MMMM Y') }}</td>
                                    <td>{{ $data->asal_surat }}</td>
                                    <td>{{ $data->perihal }}</td>
                                    <td>{{ $data->bagian ? $data->bagian : '-' }}</td>
                                    <td>
                                        @if ($data->lampiran)
                                            <a href="{{ Storage::url($data->lampiran) }}" target="_blank"
                                                rel="noopener noreferrer">Lampiran</a>
                                        @endif
                                    </td>
                                    <td>{{ $data->kepentingan }}</td>
                                    <td>{{ $data->user->nama }}</td>
                                    <td>{{ $data->penerima }}</td>
                                    <td>
                                        @if ($data->penerima == null || $data->is_tolak == false)
                                        @else
                                            <div class="text-warning">Pending...</div>
                                        @endif
                                        @if ($data->penerima)
                                            <div class="text-primary">Siap Disposisi</div>
                                        @endif
                                        @if ($data->is_disposisi)
                                            <div class="text-success">Telah Disposisi</div>
                                        @endif
                                        @if ($data->is_tolak)
                                            <div class="text-danger">Ditolak</div>
                                        @endif
                                    </td>
                                    <td>
                                        @if (auth()->user()->role == 'subbag' && $data->penerima == null && $data->is_tolak == false)
                                            <a href="#" wire:click="terimaSurat('{{ $data->id }}')"
                                                type="button" class="btn btn-sm m-1 btn-warning">Terima surat</a>
                                            <button type="button" wire:click="tolak_surat('{{ $data->id }}')"
                                                class="btn btn-sm m-1 btn-danger">Tolak surat</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</div>
