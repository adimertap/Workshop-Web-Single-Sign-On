<?php

namespace App\Model\Service;

use App\Model\FrontOffice\CustomerBengkel;
use App\Model\FrontOffice\MasterDataJenisPerbaikan;
use App\Model\FrontOffice\MasterDataKendaraan;
use App\Model\FrontOffice\MasterDataPitstop;
use App\Model\Inventory\Sparepart;
use App\Model\Kepegawaian\Pegawai;
use App\Model\SingleSignOn\Bengkel;
use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PenerimaanService extends Model
{
    protected $table = "tb_service_advisor";

    protected $primaryKey = 'id_service_advisor';

    protected $fillable = [
        'id_kendaraan', 'date', 'id_customer_bengkel', 'id_bengkel', 'keluhan_kendaraan', 'id_jenis_perbaikan', 'id_sparepart', 'id_pegawai', 'waktu_estimasi', 'id_mekanik', 'status'
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
        $getId = DB::table('tb_service_advisor')->orderBy('id_service_advisor', 'DESC')->take(1)->get();
        if (count($getId) > 0) return $getId;
        return (object)[
            (object)[
                'id_service_advisor' => 0
            ]
        ];
    }



    public function bengkel()
    {
        return $this->belongsTo(Bengkel::class, 'id_bengkel');
    }

    public function kendaraan()
    {
        return $this->belongsTo(MasterDataKendaraan::class, 'id_kendaraan');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }

    public function mekanik()
    {
        return $this->belongsTo(Pegawai::class, 'id_mekanik');
    }

    public function pitstop()
    {
        return $this->belongsTo(MasterDataPitstop::class, 'id_pitstop');
    }

    public function customer_bengkel()
    {
        return $this->belongsTo(CustomerBengkel::class, 'id_customer_bengkel', 'id_customer_bengkel');
    }

    public function detail_sparepart()
    {
        return $this->belongsToMany(Sparepart::class, 'tb_service_detail_sparepart', 'id_service_advisor', 'id_sparepart')->withPivot('jumlah', 'total_harga', 'harga');
    }

    public function detail_perbaikan()
    {
        return $this->belongsToMany(Sparepart::class, 'tb_service_detail_perbaikan', 'id_service_advisor', 'id_jenis_perbaikan')->withPivot('total_harga');
    }
}
