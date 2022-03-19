@extends('layouts.app')

@section('content')
<div class="container-lg-fluid mx-lg-4 mx-md-4 mx-4">
    <div class="row mb-3"><h1 style="font-weight: bold" class="text-center text-lg-start text-md-start">Pengaturan</h1></div>
    <div class="row">
        <form action="" class="">
            <div class="bg-white shadow rounded-custom px-4 py-3">
                <h4 class="mb-3">Hardware Info</h4>
                <div class="form-group d-flex flex-column flex-lg-row flex-md-row justify-content-between">
                    <h5 class="text-muted align-self-lg-center align-self-md-center">ID Mesin</h5>
                    <div class="">
                        <input type="text" class="form-control shadow-none border-3">
                        <small class="text-green">ID Mesin Valid</small>
                    </div>
                </div>
            </div>
            <div class="bg-white shadow rounded-custom px-4 py-3 mt-4">
                <h4 class="mb-3">Akun</h4>
                <div class="d-flex flex-column">
                    <div class="d-sm-flex flex-row align-items-center justify-content-between">
                        <h5 class="text-muted">Email</h5>
                        <div class="">
                            <input type="email" class="form-control shadow-none border-3 d-inline" value="{{ $email }}">
                        </div>
                    </div>
                    <div class="mt-3 d-sm-flex flex-row align-items-center justify-content-between">
                        <h5 class="text-muted">Password</h5>
                        <div>
                            <input type="password" class="form-control shadow-none border-3" placeholder="New password">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 mb-10 mb-lg-0 mb-md-0 d-flex justify-content-center">
                <button type="button" class="btn btnSimpanPengaturan text-white shadow-none">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
