<?php

namespace App\Http\Controllers;

use App\Models\KriteriaModel;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $title = 'Kriteria';
        $no = 1;
        $kriteria = KriteriaModel::orderBy('nama_kriteria', 'ASC')->get();

        return view('admin.kriteria.kriteria', compact(
            'title',
            'no',
            'kriteria'
        ));
    }

    public function action_tambah(Request $request)
    {
        $nama_kriteria = $request->nama_kriteria;
        $atribut = $request->atribut;
        $bobot = $request->bobot;

        $kriteria = new KriteriaModel();

        $kriteria->nama_kriteria = $nama_kriteria;
        $kriteria->atribut = $atribut;
        $kriteria->bobot = $bobot;

        $kriteria->save();
        return back()->with('success', 'Kriteria berhasil di tambah.');
    }

    public function edit($id)
    {
        $title = 'Edit Kriteria';
        $detail = KriteriaModel::findOrFail($id);

        return view('admin.kriteria.kriteria_edit', compact(
            'title',
            'detail'
        ));
    }

    public function action_edit($id, Request $request)
    {
        $nama_kriteria = $request->nama_kriteria;
        $atribut = $request->atribut;
        $bobot = $request->bobot;

        $kriteria = KriteriaModel::findOrFail($id);
        $kriteria->update([
            'nama_kriteria' => $nama_kriteria,
            'atribut' => $atribut,
            'bobot' => $bobot
        ]);
        
        return redirect('/kriteria')->with('success', 'Kriteria berhasil di update.');
    }

    public function hapus($id)
    {
        $kriteria = KriteriaModel::findOrFail($id);
        $kriteria->delete();
        return redirect('/kriteria')->with('success', 'Kriteria berhasil di hapus.');
    }
}
