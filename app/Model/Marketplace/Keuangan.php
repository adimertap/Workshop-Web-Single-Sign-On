<?php

namespace App\Model\Marketplace;


use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
  protected $table = "tb_marketplace_keuangan";

    protected $primaryKey = 'id_keuangan';

    protected $fillable = [
       'id_bengkel', 'jumlah', 'nama_bank', 'no_rekening', 'nama_rekening'];
}
