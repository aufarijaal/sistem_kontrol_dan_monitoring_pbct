@extends('layouts.app')

@section('content')
<div class="container-fluid m-0 p-0 px-lg-4 h-100 d-flex flex-column">
    <div class="row justify-content-center d-flex">
        <h1 style="font-weight: 700" class="text-center text-lg-start text-md-start" id="halaman">Statistik Produksi</h1>
        <small class="text-center text-md-start" id="machineid">{{ $machineid }}</small>
    </div>
    <div class="row flex-grow-1 align-items-center">
        <div class="col col-lg-9 mt-2 mt-md-0 canvasWrapper">
            <canvas id="chartStat" class="bg-white p-1 rounded-3 shadow" style="border-radius: 100px; min-width: 260px; min-height: 130px; max-width: 900px; max-height: 500px;"></canvas>
        </div>
        <div class="col-md col-lg d-flex flex-column align-items-center mb-md-0" style="margin-bottom: 120px;">
            <div class="mt-4 mt-md-0 mb-1 mb-md-3">
                <div class="form-group">
                  <select class="form-control shadow-none bg-white border-2 form-select rounded-custom" name="" id="filterHalusKasar">
                    <option value="kasar">Bubuk Kasar</option>
                    <option value="halus">Bubuk Halus</option>
                  </select>
                </div>
            </div>
            <div class="mt-4 mt-md-0">
                <div class="form-group">
                  <select class="form-control shadow-none bg-white border-2 form-select rounded-custom" name="" id="filterWaktuStatistik">
                    <option value="harian" harian>Hari ini</option>
                    <option value="mingguan">7 Hari tkhr</option>
                    <option value="bulanan">Bulan ini</option>
                  </select>
                </div>
            </div>
            <div class="py-4">
                <div class="">
                    <i class="bi bi-arrow-up-square-fill" style="font-size: 1.5rem"></i>
                    <span class="" style="font-weight: 500; font-size: 1rem;">Berat (Kg)</span>
                </div>
                <div class="">
                    <i class="bi bi-arrow-right-square-fill" style="font-size: 1.5rem"></i>
                    <span class="ml-5" style="font-weight: 500; font-size: 1rem;">Periode</span>
                </div>
            </div>
            {{-- <div class="d-flex gap-3">
                <div class="bg-white shadow rounded-custom py-3">

                    <div>
                        <div>
                            <span>Terbanyak</span>
                            <h3></h3>
                        </div>
                        <div>
                            <span>Tersedikit</span>
                            <h3></h3>
                        </div>
                        <div>
                            <span>Rata-rata</span>
                            <h3></h3>
                        </div>
                    </div>

                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
