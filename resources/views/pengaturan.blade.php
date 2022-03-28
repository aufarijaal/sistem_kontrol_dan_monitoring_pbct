@extends('layouts.app')

@section('content')
<div class="container-lg-fluid mx-lg-4 mx-md-4 mx-4">
    @if (Session::has('success'))
        <div class="alert shadow rounded-pill alert-success d-flex justify-content-around align-items-center" style="position: absolute; left: 0; right: 0; top: 10px; margin-left: auto; margin-right:auto; width: 280px; height: 50px; " role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @php
            Session::forget('success');
        @endphp
    @elseif (Session::has('failed'))
        <div class="alert shadow rounded-pill alert-danger d-flex justify-content-around align-items-center" style="position: absolute; left: 0; right: 0; top: 10px; margin-left: auto; margin-right:auto; width: 280px; height: 50px; " role="alert">
            {{ Session::get('failed') }}
            <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @php
            Session::forget('failed');
        @endphp
    @endif
    <div class="row mb-3"><h1 style="font-weight: bold" class="text-center text-lg-start text-md-start" id="halaman">Pengaturan</h1></div>
    <div class="row">
        <div class="bg-white shadow rounded-custom px-4 py-3">
            <h4 class="mb-3">Hardware Info</h4>
            <div class="form-group d-flex flex-column flex-lg-row flex-md-row justify-content-between">
                <h5 class="text-muted align-self-lg-center align-self-md-center">ID Mesin</h5>
                <form action="{{ $machineid == null ? route('bindmachine') : route('unbindmachine') }}" method="post" class="d-flex flex-column flex-md-row align-items-center justify-content-center" style="column-gap: 10px">
                    @csrf
                    <input type="text" class="form-control shadow-none border-3" {{ $machineid == null ? '' : 'readonly' }} name="machineid" value="{{ $machineid == null ? '' : $machineid }}" name="machineid">
                    @if($machineid != null)
                        <button type="submit" class="btn btnSimpanIdMesin text-white shadow-none bg-orange mt-2 mt-md-0">Hapus</button>
                    @elseif ($machineid == null)
                        <button type="submit" class="btn btnSimpanIdMesin text-white shadow-none bg-custom-blue mt-2 mt-md-0">Simpan</button>
                    @endif
                </form>
            </div>
        </div>
        <div class="bg-white shadow rounded-custom px-4 py-3 mt-4 mb-10 mb-lg-0 mb-md-0">
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
    </div>
</div>
@endsection
