@extends('layouts.app')

@section('content')
<div class="container h-100 align-items-sm-center justify-content-sm-center d-flex flex-column">
    {{-- <div class="row justify-content-center"> --}}
        <button class="shadow-none rounded-circle onOffBlender border-0 mt-5" style="width: 7rem; height: 7rem;">
        </button>
        <button class="btn shadow-none btnTimer text-white mt-2" data-bs-toggle="modal" data-bs-target="#timePickModal"
        style="background-color: #9584F5;">
            Timer
            <i class="bi bi-hourglass-split"></i>
        </button>
    {{-- </div> --}}
</div>
@endsection
