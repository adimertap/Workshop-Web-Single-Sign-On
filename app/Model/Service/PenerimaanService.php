<?php

namespace App\Model\Service;

use App\Model\FrontOffice\CustomerBengkel;
use App\Model\FrontOffice\MasterDataJenisPerbaikan;
use App\Model\FrontOffice\MasterDataKendaraan;
use App\Model\Inventory\Sparepart;
use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PenerimaanService extends Model
{
    protected $table = "tb_service_advisor";

    protected $primaryKey = 'id_service_advisor';

    protected $fillable = [
        'id_kendaraan', 'date', 'id_customer_bengkel', 'id_bengkel', 'keluhan_kendaraan', 'id_jenis_perbaikan', 'id_sparepart', 'id_pegawai', 'waktu_estimasi'
    ];

    protected $hidden = [];

    public $timestamps = false;

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }

    // relations
    public static function getId()
    {
        return $getId = DB::table('tb_service_advisor')->orderBy('id_service_advisor', 'DESC')->take(1)->get();
    }

    public function kendaraan()
    {
        return $this->belongsTo(MasterDataKendaraan::class, 'id_kendaraan');
    }

    public function customer_bengkel()
    {
        return $this->belongsTo(CustomerBengkel::class, 'id_customer_bengkel', 'id_customer_bengkel');
    }
}
