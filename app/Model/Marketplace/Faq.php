<?php

namespace App\Model\Marketplace;

use App\Model\Marketplace\Usermarket;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = "tb_fo_master_faq";

    protected $primaryKey = 'id_fo_faq';

    protected $fillable = [
        'pertanyaan_faq', 'jawaban_faq'
    ];

    protected $hidden = [];

    public $timestamps = false;

    public function User(){
        return $this->hasOne(Usermarket::class, 'id_user', 'id_user');
    }
}
