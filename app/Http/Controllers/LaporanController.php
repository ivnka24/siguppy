<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use Yajra\DataTables\Facades\DataTables;

class LaporanController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            return DataTables::of(Laporan::get())
            ->make();
        }
        return view('v_laporan');
    }

    public function store(Request $request) {
        try {
            Laporan::create([
                'suhu' => $request->suhu,
                'ph' => $request->ph,
                'hasil_fuzzy' => $request->hasil_fuzzy
            ]);

            return response()->json(['message' => 'Data terkirim'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
