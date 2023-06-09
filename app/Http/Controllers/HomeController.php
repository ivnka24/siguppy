<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $laporan = Laporan::latest()->take(25)->get()->reverse();
            $data = [
                'created_at' => $laporan->pluck('created_at'),
                'suhu' => $laporan->pluck('suhu'),
                'ph'   => $laporan->pluck('ph'),
            ];
            return response()->json($data);
        }
        return view('v_home');
    }
}
