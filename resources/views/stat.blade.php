@extends('layouts.app')

@section('content')
<div class="container-fluid m-0 p-0 px-lg-4 h-100 d-flex flex-column">
    <div class="row justify-content-center d-flex">
        <h1 style="font-weight: 700" class="text-center text-lg-start text-md-start" id="halaman">Statistik Produksi</h1>
        <small class="text-center text-md-start" id="machineid">{{ $machineid }}</small>
    </div>
    <div class="row flex-grow-1 align-items-center">
        <div class="col col-lg-9">
            <canvas id="chartStat" class="bg-white p-2 rounded-3 shadow" style="border-radius: 100px; min-width: 260px; min-height: 130px; max-width: 900px; max-height: 500px;"></canvas>
        </div>
        <div class="col-md col-lg d-flex flex-column align-items-center mb-md-0" style="margin-bottom: 120px;">
            <div class="mt-4 mt-md-0">
                <div class="form-group">
                  <select class="form-control shadow-none bg-white border-2 form-select rounded-custom" name="" id="filterWaktuStatistik">
                    <option value="harian">Harian</option>
                    <option value="mingguan">Mingguan</option>
                    <option value="bulanan">Bulanan</option>
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
            <div class="d-flex gap-3">
                <div class="bg-white shadow rounded-custom py-3">

                    {{-- Halus --}}
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

                    {{-- Kasar --}}
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

                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row my-3 my-md-0 px-3 justify-content-center">
        <div class="col-6 d-flex flex-column align-items-center">
            <div class="">
                <i class="bi bi-arrow-up-square-fill" style="font-size: 1.5rem"></i>
                <span class="" style="font-weight: 500; font-size: 1rem;">Berat (Kg)</span>
            </div>
            <div class="">
                <i class="bi bi-arrow-right-square-fill" style="font-size: 1.5rem"></i>
                <span class="ml-5" style="font-weight: 500; font-size: 1rem;">Periode</span>
            </div>
        </div>
    </div>
    <div class="row justify-content-center" style="margin-bottom: 100px">
        <div class="bg-white col-4 shadow rounded-custom py-3" style="width: 134px; height: 205px;">
            <div class="d-flex flex-column align-items-center">
                <span class="" style="font-weight: 700">Tertinggi</span>
                <h3 style="font-weight: 800" class="text-blue">0 Kg</h3>
            </div>
            <div class="d-flex flex-column align-items-center">
                <span class="" style="font-weight: 700">Tertinggi</span>
                <h3 style="font-weight: 800" class="text-orange">0 Kg</h3>
            </div>
            <div class="d-flex flex-column align-items-center">
                <span class="" style="font-weight: 700">Tertinggi</span>
                <h3 style="font-weight: 800" class="text-green">0 Kg</h3>
            </div>
        </div>
    </div> --}}

</div>
@endsection
