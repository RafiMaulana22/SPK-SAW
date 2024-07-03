<?php

namespace App\Http\Controllers;

use App\Models\AlternatifModel;
use App\Models\CripsModel;
use App\Models\KriteriaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $alternatif = AlternatifModel::count();
        $kriteria = KriteriaModel::count();
        $crips = CripsModel::count();

        return view('admin.dashboard.dashboard', compact(
            'title',
            'alternatif',
            'kriteria',
            'crips',
        ));
    }
}
