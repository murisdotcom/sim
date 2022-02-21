<?php 

namespace App\Controllers;

use App\Models\ProdukModel;

class Produk extends BaseController
{

  protected $produkModel;
  public function __construct()
  {
    $this->produkModel= new ProdukModel();
  }

  public function index()
  {
    // $produk = $this->produkModel->findAll();

    $data = [
      'title' => 'Daftar Produk Ms Glow',
      'produk' => $this->produkModel->getProduk()
    ];

    return view('produk/index', $data);
  }

  public function detail($slug)
  {
    $data = [
      'title' => 'Detail Produk | MS GLOW',
      'produk' => $this->produkModel->getProduk($slug)
    ];
    return view('produk/detail', $data);
  }
}