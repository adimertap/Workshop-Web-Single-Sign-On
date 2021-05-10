<?php

namespace App\Model\FrontOffice;

use App\Model\Inventory\Sparepart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class PenjualanSparepart extends Model
{
    use SoftDeletes;

    protected $table = "tb_fo_penjualan_sparepart";

    protected $primaryKey = 'id_penjualan_sparepart';

    protected $fillable = [
        'kode_penjualan',
        'id_customer_bengkel',
        'tanggal',
        'status_bayar',
        'total_bayar'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

    // relations
    public function Customer()
    {
        return $this->belongsTo(CustomerBengkel::class, 'id_customer_bengkel', 'id_customer_bengkel');
    }

    public function Detailsparepart()
    {
        return $this->belongsToMany(Sparepart::class, 'tb_fo_detail_penjualan_sparepart', 'id_penjualan_sparepart', 'id_sparepart')->withPivot('jumlah', 'total_harga');
    }

    public static function getId()
    {
        // return $this->orderBy('id_sparepart')->take(1)->get();
        return $getId = DB::table('tb_fo_penjualan_sparepart')->orderBy('id_penjualan_sparepart', 'DESC')->take(1)->get();
    }
}
