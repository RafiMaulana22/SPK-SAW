<?php

namespace App\Http\Controllers;

use App\Models\AlternatifModel;
use App\Models\KriteriaModel;
use App\Models\Penilaian;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PenilaianControllerr extends Controller
{
    public function index()
    {
        $alternatif = AlternatifModel::with('penilaian.crips')->get();
        $kriteria = KriteriaModel::with('crips')->orderBy('nama_kriteria', 'ASC')->get();
        // return response()->json($alternatif);
        // dd($alternatif->toArray());
        $title = 'Penilaian';

        return view('admin.penilaian.penilaian', compact(
            'alternatif',
            'kriteria',
            'title'
        ));
    }

    public function action_tambah(Request $request)
    {
        // dd($request->toArray());
        // return response()->json($request);
        DB::select("TRUNCATE penilaians");
        foreach ($request->id_crips as $key => $value) {
            foreach ($value as $key_1 => $value_1)
            {
                Penilaian::create([
                    'id_alternatif' => $key,
                    'id_crips' => $value_1
                ]);
            }
        }

        return back()->with('success', 'Penilaian berhasil di simpan.');
    }
}
