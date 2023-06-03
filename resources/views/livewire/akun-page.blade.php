<div>
    <div class="container-fluid">
        <h1 class="mt-4">Akun</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Kelola akun</li>
        </ol>
        @if(session('alertSuccess'))
            <div class="alert alert-success">
                {{ session('alertSuccess') }}
            </div>
        @endif
        @if(session('alertError'))
            <div class="alert alert-danger">
                {{ session('alertError') }}
            </div>
        @endif
        @if ($buatPage)
            <div class="col-4">
                <div class="card">
                    <div class="card-header">Buat akun baru</div>
                    <div class="card-body">
                        <form wire:submit.prevent="simpan">
                            <div class="mb-2">
                                <div class="">Nama</div>
                                <input required wire:model='nama' type="text" class="form-control" maxlength="30" placeholder="Nama lengkap">
                            </div>
                            <div class="mb-2">
                                <div class="">Username</div>
                                <input required wire:model='username' type="text" class="form-control" maxlength="30" placeholder="Username">
                            </div>
                            <div class="mb-2">
                                <div class="">Password</div>
                                <input required wire:model='password' type="password" class="form-control" maxlength="30" placeholder="password">
                            </div>
                            <div class="mb-2">
                                <div class="">Role</div>
                                <select class="form-control" required wire:model='role'>
                                    <option value="">Pilih</option>
                                    <option value="admin">admin</option>
                                    <option value="kadis">kadis</option>
                                    <option value="subbag">subbag</option>
                                    <option value="staff">staff</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <div class="">Bagian (opsional)</div>
                                <input wire:model='bagian' type="text" class="form-control" maxlength="30" placeholder="Bagian apa">
                            </div>
                            <div class="mb-2">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <button wire:click='buatPageFalse' type="button" class="btn btn-secondary ms-2">Tutup</button>
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
                            Data Akun</div>
                        <div class="">
                            <button type="button" wire:click='buatPageTrue' class="btn-success btn">Buat akun</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Username</th>
                                <th>role</th>
                                <th>bagian</th>
                                <th>status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->username }}</td>
                                    <td>{{ $data->role }}</td>
                                    <td>{{ $data->bagian }}</td>
                                    <td>
                                        <button wire:click="status('{{ $data->id }}')" type="button"
                                            class="btn @if ($data->isaktif) btn-success
                                        @else
                                        btn-danger @endif">
                                            @if ($data->isaktif)
                                                aktif
                                            @else
                                                tidak aktif
                                            @endif
                                        </button>
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
