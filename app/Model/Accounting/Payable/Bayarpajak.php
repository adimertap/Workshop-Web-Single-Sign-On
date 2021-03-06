<?php

namespace App\Model\Accounting\Payable;

use App\Model\Accounting\Jenistransaksi;
use App\Model\Kepegawaian\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bayarpajak extends Model
{
    use SoftDeletes;

    protected $table = "tb_accounting_pajak";

    protected $primaryKey = 'id_pajak';

    protected $fillable = [
        'kode_pajak',
        'id_pegawai',
        'id_jenis_transaksi',
        'tanggal_bayar',
        'deskripsi_pajak',
        'status_jurnal',
        'total_pajak',
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

    public function Detail()
    {
        return $this->hasMany(Pajakdetail::class,'id_pajak');
    }

    public function Pegawai()
    {
        return $this->belongsTo(Pegawai::class,'id_pegawai','id_pegawai');
    }

    public function Jenistransaksi()
    {
        return $this->belongsTo(Jenistransaksi::class,'id_jenis_transaksi','id_jenis_transaksi');
    }
}
