<div>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">

                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <div class="text-center">
                                        <img src="{{ asset('img/Coat_of_arms_of_South_Sumatra.svg.png') }}"
                                            width="150" height="200" alt="">
                                    </div>
                                    <div class="">
                                        <h4 class="text-center font-weight-light my-4">Aplikasi E-Surat Dinas
                                            Pemberdayaan Masyarakat dan Desa Provinsi Sumatera Selatan</h4>
                                    </div>
                                    <div class="">
                                        <h5 class="text-center font-weight-light my-4">Login Untuk Masuk</h5>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if (session('alert'))
                                    <div class="alert alert-danger">
                                        {{ session('alert') }}
                                    </div>
                                @endif
                                    <form wire:submit.prevent='login'>
                                        <div class="form-floating mb-3">
                                            <input wire:model='username' class="form-control" id="inputEmail" type="text"
                                                placeholder="name@example.com" />
                                            <label for="inputEmail">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input wire:model='password' class="form-control" id="inputPassword" type="password"
                                                placeholder="Password" />
                                            <label for="inputPassword">Password</label>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">

                                            <button type="submit" class="btn btn-primary form-control">Login</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; DPMD SUMSEL</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>
