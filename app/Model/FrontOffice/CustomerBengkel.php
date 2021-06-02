<?php

namespace App\Model\FrontOffice;

use App\Scopes\OwnershipScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class CustomerBengkel extends Model
{
    use SoftDeletes;

    protected $table = "tb_fo_customer_bengkel";

    protected $primaryKey = 'id_customer_bengkel';

    protected $fillable = [
        'nama_customer',
        'email_customer',
        'nohp_customer',
        'alamat_customer',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

    public static function getId()
    {
        $getId = DB::table('tb_fo_customer_bengkel')->orderBy('id_merk_kendaraan', 'DESC')->take(1)->get();
        if (count($getId) > 0) return $getId;
        return (object)[
            (object)[
                'id_merk_kendaraan' => 0
            ]
        ];
    }

    protected static function booted()
    {
        static::addGlobalScope(new OwnershipScope);
    }
}
