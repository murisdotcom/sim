<?php 

namespace App\Controllers;

class Produk extends BaseController
{
  public function index()
  {
    $data = [
      'title' => 'Daftar Produk Ms Glow'
    ];
    
    return view('produk/index', $data);
  }
}