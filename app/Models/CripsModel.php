<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CripsModel extends Model
{
    use HasFactory;

    protected $table = 'crips';
    protected $guarded = [];

    public static function getAllCrips()
    {
        $query = DB::table('crips')
            ->join('kriteria', 'kriteria.id_kriteria', '=', 'crips.id_kriteria');

        return $query;
    }

    public function crips()
    {
        return $this->hasMany(CripsModel::class, 'id_crips', 'id_crips');
    }

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'id_crips');
    }
}
