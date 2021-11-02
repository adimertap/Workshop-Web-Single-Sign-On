<?php

namespace App\Model\SingleSignOn;

use App\Scopes\OwnershipScope;
use App\User;
use Illuminate\Database\Eloquent\Model;

class PaymentBengkel extends Model
{
    protected $table = "tb_payment_bengkel";

    protected $primaryKey = 'id_payment_bengkel';

    protected $fillable = [
        'status',
        'id_bengkel'
    ];

    public $timestamps = false;

    // relations
    public function bengkel()
    {
        return $this->belongsTo(Bengkel::class, 'id_bengkel', 'id_bengkel');
    }
}
