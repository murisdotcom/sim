<?php

namespace App\Controllers;

class Pages extends BaseController

{
  public function index()
  {

    $data = [
      'title' => 'Home | Website MS GLOW'
    ];

    return view('pages/home', $data);
  }

  public function about()
  {
        $data = [
      'title' => 'About Me | Website MS GLOW'
    ];

    return view('pages/about', $data);
  }

  public function contact()
  {
    $data = [
      'title' => 'Contact Us | Website MS GLOW',
      'alamat' => [
        [
          'tipe' => 'rumah',
          'alamat' => 'Jl. Cipare no 32.B',
          'kota' => 'Serang'
        ],
        [
          'tipe' => 'Kantor',
          'alamat' => 'Jl. Lumba no 11.C',
          'kota' => 'Pandeglang'
        ]
      ]
    ];
    return view('pages/contact', $data);
  }
  
}
