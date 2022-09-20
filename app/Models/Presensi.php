<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;
    protected $table = 'presensi';
    protected $primaryKey = 'id_presensi';

    protected $fillable = [
        'id_karyawan',
        'masuk',
        'keluar',
        'status'
    ];
    public $timestamps = FALSE;
}
