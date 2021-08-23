<?php

namespace App\Model\Marketplace;

use App\Bank;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
  protected $table = "tb_marketplace_keuangan";

    protected $primaryKey = 'id_keuangan';

    protected $fillable = [
       'id_bengkel', 'jumlah', 'nama_bank', 'no_rekening', 'nama_rekening'];

    public function Bank()
    {
        return $this->belongsTo(Bank::class, 'nama_bank', 'id_bank');
    }
}
