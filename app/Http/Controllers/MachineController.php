<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MachineController extends Controller
{
    public function __construct()
    {

    }

    public function getInfo(Request $request)
    {
        $result = DB::table('machines')
                    ->select()
                    ->where('machineid', $request->machineid)
                    ->get()
                    ->first();

        return response()->json($result);
    }
    // Dikirim oleh Microcontroller
    public function sendInfo(Request $request)
    {
        DB::table('machines')
                    ->where('machineid', $request->machineid)
                    ->update([
                        'temperature' => $request->temperature,
                        'stockhalus' => $request->stockhalus,
                        'stockkasar' => $request->stockkasar
                    ]);
        return response()->noContent();
    }

    public function setMachinePower(Request $request)
    {
        DB::table('machines')
                    ->where('machineid', $request->machineid)
                    ->update(['isactive' => $request->state]);

        return response()->noContent();
    }
    public function setHalusKasar(Request $request)
    {
        DB::table('machines')
                    ->where('machineid', $request->machineid)
                    ->update(['ishalus' => $request->ishalus]);

        return response()->noContent();
    }

    public function bindMachineWithUser(Request $request)
    {
        $this->middleware('auth');
        $request->validate([
            'machineid' => 'required'
        ]);
        $machine = DB::update('UPDATE machines SET userid = :userid_param WHERE machineid = :machineid_param AND userid IS NULL', [auth()->user()->id, $request->machineid]);

        if($machine == 1) {
            return back()->with('success', 'Berhasil menghubungkan');
        }else if($machine == 0) {
            return back()->with('failed', 'Gagal menghubungkan');
        }
    }
    public function unbindMachineFromUser(Request $request)
    {
        // dd($request->machineid);
        $this->middleware('auth');
        $machine = DB::table('machines')
                    ->where('userid', auth()->user()->id)
                    ->where('machineid', $request->machineid)
                    ->update(['userid' => null]);


        if($machine == 1) {
            return back()->with('success', 'Berhasil menghapus');
        }else if($machine == 0) {
            return back()->with('failed', 'Gagal menghapus');
        }
    }
}
