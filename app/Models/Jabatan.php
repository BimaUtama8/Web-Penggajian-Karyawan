<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $table = 'jabatan';
    protected $primaryKey = 'id_jabatan';

    protected $fillable = [
        'id_jabatan',
        'nama_jabatan',
        'tunjangan_makan',
        'tunjangan_transportasi'
    ];

    public $timestamps = FALSE;
}
