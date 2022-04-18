<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StatController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::check())
        {
            $machineid = DB::table('machines')->where('userid', auth()->user()->id)->value('machineid');
            return view('stat')->with('machineid', $machineid);
        }else{
            return redirect('/');
        }
    }

    public function getStat(Request $request)
    {
        $harian = date(now()->startOfDay());
        $mingguan = date(now()->subDays(7));
        $bulanan = date(now()->subDays(30));
        $bubuk = ($request->bubuk == 'kasar') ? 'weightkasar' : 'weighthalus';

        $result = DB::table('stats')
                    ->select($bubuk, 'created_at')
                    ->where('machineid', $request->machineid)
                    ->where($bubuk, '>', 0)
                    ->whereBetween('created_at', [($request->option == 'harian') ? $harian : (($request->option == 'mingguan') ? $mingguan : $bulanan), date(now())])
                    ->orderBy('created_at')
                    ->get();
        return response()->json($result);
    }
    // Dikirim oleh Microcontroller
    public function newProduction(Request $request)
    {
        DB::table('stats')
                    ->insert([
                        'machineid' => 'sCNO_YnXOFAKID',
                        'weighthalus' => $request->weighthalus,
                        'weightkasar' => $request->weightkasar,
                    ]);
        return response()->noContent();
    }
}
