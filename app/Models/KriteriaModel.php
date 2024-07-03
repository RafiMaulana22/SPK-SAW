<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KriteriaModel extends Model
{
    use HasFactory;

    protected $table = 'kriteria';
    protected $guarded = [];

    public function crips()
    {
        return $this->hasMany(CripsModel::class, 'id_kriteria');
    }
}
