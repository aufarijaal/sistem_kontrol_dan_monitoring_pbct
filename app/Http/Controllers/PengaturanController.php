<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PengaturanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $machine = DB::table('machines')->where('userid', auth()->user()->id)->value('machineid');
        $data = [
            'email' => auth()->user()->email,
            'machineid' => $machine
        ];
        // dd($data);
        return view('pengaturan')->with($data);
    }
}
