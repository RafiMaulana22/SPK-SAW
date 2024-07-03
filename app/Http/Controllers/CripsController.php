<?php

namespace App\Http\Controllers;

use App\Models\CripsModel;
use App\Models\KriteriaModel;
use Illuminate\Http\Request;

class CripsController extends Controller
{
    public function index($id)
    {
        $title = 'Crips';
        $no = 1;
        $detail = KriteriaModel::findOrFail($id);
        $crips = CripsModel::where('id_kriteria', $id)->get();

        return view('admin.kriteria.kriteria_crips', compact(
            'title',
            'no',
            'detail',
            'crips'
        ));
    }

    public function action_tambah(Request $request)
    {
        $id_kriteria = $request->id_kriteria;
        $nama_crips = $request->nama_crips;
        $bobot_crips = $request->bobot_crips;

        $crips = new CripsModel();
        $crips->id_kriteria = $id_kriteria;
        $crips->nama_crips = $nama_crips;
        $crips->bobot_crips = $bobot_crips;

        $crips->save();
        return back()->with('success', 'Crips berhasil di tambah.');
    }

    public function edit($id)
    {
        $title = 'Edit Crips';
        $detail = CripsModel::findOrFail($id);
        $kriteria = KriteriaModel::get();

        return view('admin.kriteria.kriteria_crips_edit', compact(
            'title',
            'detail',
        ));
    }

    public function action_edit($id, Request $request)
    {
        $nama_crips = $request->nama_crips;
        $bobot_crips = $request->bobot_crips;

        $crips = CripsModel::findOrFail($id);
        $crips->update([
            'nama_crips' => $nama_crips,
            'bobot_crips' => $bobot_crips
        ]);

        return redirect('/kriteria')->with('success', 'Crips berhasil di update.');
    }

    public function hapus($id)
    {
        $crips = CripsModel::findOrFail($id);
        $crips->delete();

        return back()->with('success', 'Crips berhasil di hapus');
    }
}
