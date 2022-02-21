<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_produk', 'slug', 'desc_produk', 'kode_produk', 'gambar'];


    public function getProduk($slug=false)
    {
        if ($slug==false){
            return $this->findAll();
        }
        return $this->where(['slug'=>$slug])->first();
    }


}