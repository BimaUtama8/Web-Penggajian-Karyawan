<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $primaryKey = 'id_gaji';

    protected $fillable = [
        'id_karyawan',
        'bulan',
        'tahun',
        'lembur',
        'jumlah_hari',
        'total_tmakan',
        'total_ttransportasi',
        'upah_lembur',
        'penghasilan_bruto',
        'penghasilan_bersih',
        'biaya_jabatan',
        'jaminan_ht',
        'jaminan_p',
        'pajak_penghasilan'
    ];
    public $timestamps = FALSE;
}
