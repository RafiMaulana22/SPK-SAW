<?php

namespace App\Http\Controllers;

use App\Models\AlternatifModel;
use App\Models\KriteriaModel;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index()
    {
        $title = 'Alternatif';
        $no = 1;
        $alternatif = AlternatifModel::get();

        return view('admin.alternatif.alternatif', compact(
            'title',
            'no',
            'alternatif'
        ));
    }

    public function action_tambah(Request $request)
    {
        $nama_alternatif = $request->nama_alternatif;

        $alternatif = new AlternatifModel();
        $alternatif->nama_alternatif = $nama_alternatif;

        $alternatif->save();
        return back()->with('success', 'Alternatif berhasil di tambah.');
    }

    public function edit($id)
    {
        $title = 'Edit Alternatif';
        $detail = AlternatifModel::findOrFail($id);

        return view('admin.alternatif.alternatif_edit', compact(
            'title',
            'detail'
        ));
    }

    public function action_edit($id, Request $request)
    {
        $nama_alternatif = $request->nama_alternatif;

        $alternatif = AlternatifModel::findOrFail($id);
        $alternatif->update([
            'nama_alternatif' => $nama_alternatif
        ]);

        return redirect('/alternatif')->with('success', 'Alternatif berhasil di update.');
    }

    public function hapus($id)
    {
        $alternatif = AlternatifModel::findOrFail($id);
        $alternatif->delete();
        
        return redirect('/alternatif')->with('success', 'Alternatif berhasil di hapus.');
    }
}
