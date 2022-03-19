@extends('layouts.app')

@section('content')
<div class="container-fluid d-flex flex-column h-100">
    <div class="row mb-3"><h1 style="font-weight: bold" class="text-center text-lg-start text-md-start">Kontrol</h1></div>
    <div class="row justify-content-center align-items-center flex-grow-1">
        <div class="col col-lg-4 col-sm-3 bg-white rounded-custom shadow d-flex flex-column p-3 align-items-center" style="max-width: 260px; max-height: 380px;">
            <h5 class="mb-4" style="font-weight: 700">TIPE</h5>
            <div class="d-flex justify-content-evenly w-100">
                <div class="d-flex flex-column">
                    <span>Kasar</span>
                    <button class="btn bg-custom-gray rounded-circle border-4 btnKasar shadow-none" style="width: 50px; height: 50px;"></button>
                </div>
                <div class="d-flex flex-column">
                    <span>Halus</span>
                    <button class="btn bg-custom-gray rounded-circle border-4 btnHalus shadow-none" style="width: 50px; height: 50px;"></button>
                </div>
            </div>
            <div>
                <button class="shadow-none rounded-circle onOffBlender border-0 mt-4 align-self-center" style="width: 7rem; height: 7rem;">
                </button>
            </div>
            <h5 style="font-weight: 600" class="mt-1">00:00:00</h5>
            <button class="btn shadow-none bg-custom-indigo text-white" data-bs-toggle="modal" data-bs-target="#timePickModal">Timer</button>
        </div>
        <div class="col-md col-lg mt-5 mt-md-0 d-flex flex-column align-items-center mb-10 mb-md-0">
            <div class="bg-white rounded-custom shadow d-flex flex-column align-items-center justify-content-center" style="width: 190px; height: 90px;">
                <h5 style="font-weight: 700">Suhu Mesin</h5>
                <h3 style="font-weight: 700" class="text-yellow">0&#176; C</h3>
            </div>
            <div class="bg-white rounded-custom shadow d-flex flex-column align-items-center justify-content-center mt-4" style="width: 190px; height: 90px;">
                <h5 style="font-weight: 700">Stok</h5>
                <h3 style="font-weight: 700" class="text-orange">0 Kg</h3>
            </div>
        </div>
    </div>
</div>
@endsection
