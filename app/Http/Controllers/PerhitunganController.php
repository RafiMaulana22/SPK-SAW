<?php

namespace App\Http\Controllers;

use App\Models\AlternatifModel;
use App\Models\KriteriaModel;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function index()
    {
        $title = 'Perhitungan';
        $alternatif = AlternatifModel::with('penilaian.crips')->get();
        // dd($alternatif->toArray());
        $kriteria = KriteriaModel::with('crips')->orderBy('nama_kriteria', 'ASC')->get();
        $penilaian = Penilaian::get();
        // return response()->json($alternatif);

        if (count($penilaian) == 0) {
            return redirect('/penilaian');
        }

        // Mencari Min Max
        foreach ($kriteria as $key => $value) {
            foreach ($penilaian as $key_1 => $value_1) {
                if ($value->id == $value_1->crips->id_kriteria) {
                    if ($value->atribut == 'Benefit') {
                        $minMax[$value->id][] = $value_1->crips->bobot_crips;
                    } elseif ($value->atribut == 'Cost') {
                        $minMax[$value->id][] = $value_1->crips->bobot_crips;
                    }
                }
            }
        }

        // Normalisasi
        foreach ($penilaian as $key_1 => $value_1) {
            foreach ($kriteria as $key => $value) {
                if ($value->id == $value_1->crips->id_kriteria) {
                    if ($value->atribut == 'Benefit') {
                        $normalisasi[$value_1->alternatif->nama_alternatif][$value->id] = $value_1->crips->bobot_crips / max($minMax[$value->id]);
                    } elseif ($value->atribut == 'Cost') {
                        $normalisasi[$value_1->alternatif->nama_alternatif][$value->id] = min($minMax[$value->id]) / $value_1->crips->bobot_crips;
                    }
                }
            }
        }

        // Perangkingan
        foreach ($normalisasi as $key => $value) {
            foreach ($kriteria as $key_1 => $value_1) {
                $rank[$key][] = $value[$value_1->id] * $value_1->bobot;
            }
        }
        $rangking = $normalisasi;

        foreach ($normalisasi as $key => $value) {
            $rangking[$key][] = array_sum($rank[$key]);
        }
        arsort($rangking);;
        // dd($normalisasi);

        return view('admin.perhitungan.perhitungan', compact(
            'title',
            'alternatif',
            'kriteria',
            'penilaian',
            'normalisasi',
            'rangking'
        ));
    }
}
