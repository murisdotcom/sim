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

    // session();

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
      'nama_produk' => [
        'rules' => 'required|is_unique[produk.nama_produk]',
        'errors' => [
          'required' => '{field} harus diisi!',
          'is_unique' => '{field} sudah terdaftar!'
        ]
        ],

      'desc_produk' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Kegunaan produk harus diisi!'
        ]
      ],

      'kode_produk' => [
        'rules' => 'required|is_unique[produk.kode_produk]',
        'errors' => [
          'required' => 'Kode produk harus diisi!',
          'is_unique' => 'Kode produk sudah terdaftar!'
        ]
        ],

      'gambar' => [
        'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]|is_unique[produk.gambar]',
        'errors' => [
          // 'uploaded' => 'Pilih gambar terlebih dahulu!',
          'max_size' => 'Ukuran gambar terlalu besar!',
          'is_image' => 'Yang anda pilih bukan gambar!',
          'mime_in' => 'Yang anda pilih bukan gambar!',
          'is_unique' => 'Gambar tidak boleh sama!'
        ]
        ]

    ])) {
      // $validation = \Config\Services::validation();

      return redirect()->to('/produk/create')->withInput();
      // return redirect()->to('/produk/create')->withInput()->with('validation', $validation);
      // $data['validation'] = $validation;
      // return view('/produk/create', $data);
    }

    // ambil gambar
    $fileGambar = $this->request->getFile('gambar');

    // apakah tidak ada gambar yang di upload
    if($fileGambar->getError() == 4){
      $namaGambar = ('default.png');
    }else {
      
      // generate nama gambar random
      $namaGambar = $fileGambar->getRandomName();
  
      // pindahkan file ke folder public/img
      $fileGambar->move('img', $namaGambar);
  
      // ambil nama file gambat
      // $namaGambar = $fileGambar->getName();
    }


    $slug = url_title($this->request->getVar('nama_produk'), '-', true);
    $this->produkModel->save([
      'nama_produk' => $this->request->getVar('nama_produk'),
      'slug' => $slug,
      'desc_produk' => $this->request->getVar('desc_produk'),
      'kode_produk' => $this->request->getVar('kode_produk'),
      'gambar' => $namaGambar
    ]);

    session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
    
    return redirect()->to('/produk');
  }
  
  public function delete($id)
  {

    // cari gambar berdasarkan id
    $produk = $this->produkModel->find($id);

    // cek jika gambarnya default
    if($produk['gambar'] != 'default.png'){

      // hapus gambar di foldernya bukan hanya di databasenya
      unlink('img/'. $produk['gambar']);
    }

    $this->produkModel->delete($id);
    
    session()->setFlashdata('pesan', 'Data berhasil dihapus.');
    return redirect()->to('/produk');
  }

  public function edit($slug)
  {
    $data = [
      'title' => 'Form Ubah Data | MS GLOW',
      'validation' => \Config\Services::validation(),
      'produk' => $this->produkModel->getProduk($slug)
    ];

    return view('produk/edit', $data);
  }

  public function update($id)
  {
    // cek judul
    $produkLama = $this->produkModel->getProduk($this->request->getVar('slug'));
    if($produkLama['nama_produk'] == $this->request->getVar('nama_produk')){
      $rule_namaproduk = 'required';
    }else{
      $rule_namaproduk = 'required|is_unique[produk.nama_produk]';
    }

    if($produkLama['kode_produk'] == $this->request->getVar('kode_produk')){
      $rule_kodeproduk = 'required';
    }else{
      $rule_kodeproduk = 'required|is_unique[produk.kode_produk]';
    }

    if($produkLama['gambar'] == $this->request->getVar('gambar')){
      $rule_gambar = 'required';
    }else{
      $rule_gambar = 'required|is_unique[produk.gambar]';
    }


    // validasi update
    if(!$this->validate([
      'nama_produk' => [
        'rules' => $rule_namaproduk,
        'errors' => [
          'required' => '{field} harus diisi!',
          'is_unique' => '{field} sudah terdaftar!'
        ]
        ],

      'desc_produk' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Kegunaan produk harus diisi!'
        ]
      ],

      'kode_produk' => [
        'rules' => $rule_kodeproduk,
        'errors' => [
          'required' => 'Kode produk harus diisi!',
          'is_unique' => 'Kode produk sudah terdaftar!'
        ]
        ],

      'gambar' => [
        'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]|is_unique[produk.gambar]',

        'errors' => [
          // 'uploaded' => 'Pilih gambar terlebih dahulu!',
          'max_size' => 'Ukuran gambar terlalu besar!',
          'is_image' => 'Yang anda pilih bukan gambar!',
          'mime_in' => 'Yang anda pilih bukan gambar!',
          'is_unique' => 'Gambar tidak boleh sama!'
        ]
        ]

    ])) {
      // $validation = \Config\Services::validation();

      return redirect()->to('/produk/edit/'. $this->request->getVar('slug'))->withInput();
    }

    $fileGambar = $this->request->getFile('gambar');
    // cari gambar berdasarkan id
    $produk = $this->produkModel->find($id);

    // cek gambar apakah tetap gambar lama
    if($fileGambar->getError() == 4){
      $namaGambar = $this->request->getVar('gambarLama');
    }else{
      // generate nama file random
      $namaGambar = $fileGambar->getRandomName();
      // pindahkan gambar
      $fileGambar->move('img', $namaGambar);

      // cek jika gambarnya default
    if($produk['gambar'] != 'default.png'){
      // hapus file lama
      unlink('img/'. $this->request->getVar('gambarLama'));
    }
  }


    $slug = url_title($this->request->getVar('nama_produk'), '-', true);
    $this->produkModel->save([
      'id' => $id,
      'nama_produk' => $this->request->getVar('nama_produk'),
      'slug' => $slug,
      'desc_produk' => $this->request->getVar('desc_produk'),
      'kode_produk' => $this->request->getVar('kode_produk'),
      'gambar' => $namaGambar
    ]);

    session()->setFlashdata('pesan', 'Data berhasil diubah.');
    
    return redirect()->to('/produk');
  }
}