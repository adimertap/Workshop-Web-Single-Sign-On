<?php

namespace App\Model\FrontOffice;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
