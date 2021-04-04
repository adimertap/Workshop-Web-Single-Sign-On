<?php

namespace App\Model\FrontOffice;

use Illuminate\Database\Eloquent\Model;

class MasterDataFAQ extends Model
{
    protected $table = "tb_fo_master_faq";

    protected $primaryKey = 'id_faq';

    protected $fillable = [
        'pertanyaan_faq', 'jawaban_faq'
    ];

    protected $hidden = [];

    public $timestamps = false;
}
