<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $table = 'penilaians';
    protected $guarded = [];

    public function crips()
    {
        return $this->belongsTo(CripsModel::class, 'id_crips');
    }

    public function alternatif()
    {
        return $this->belongsTo(AlternatifModel::class, 'id_alternatif');
    }
}
