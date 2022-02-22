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

    // jika komik tidak ada di tabel
    if(empty($data['produk'])){
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Produk '. $slug .' tidak ditemukan.');
    }

    return view('produk/detail', $data);
  }

  public function create()
  {

    session();

    $data = [
      'title' => 'Form Tambah Data | MS GLOW',
      'validation' => \Config\Services::validation()
    ];

    return view('produk/create', $data);
  }

  public function save()
  {
    // validasi input
    if(!$this->validate([
      'nama_produk' => 'required|is_unique[produk.nama_produk]',
      'desc_produk' => 'required',
      'kode_produk' => 'required|is_unique[produk.kode_produk]',
      'gambar' => 'required'

    ])) {
      $validation = \Config\Services::validation();

      return redirect()->to('/produk/create')->withInput()->with('validation', $validation);
      // $data['validation'] = $validation;
      // return view('/produk/create', $data);
    }

    $slug = url_title($this->request->getVar('nama_produk'), '-', true);
    $this->produkModel->save([
      'nama_produk' => $this->request->getVar('nama_produk'),
      'slug' => $slug,
      'desc_produk' => $this->request->getVar('desc_produk'),
      'kode_produk' => $this->request->getVar('kode_produk'),
      'gambar' => $this->request->getVar('gambar')
    ]);

    session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

    return redirect()->to('/produk');
  }
}