<?php

namespace App\Controllers;

class Pages extends BaseController

{
  public function index()
  {

    $data = [
      'title' => 'Home | Website MS GLOW'
    ];

    echo view('pages/home', $data);
  }

  public function about()
  {
        $data = [
      'title' => 'About Me | Website MS GLOW'
    ];

    echo view('pages/about', $data);
  }
  
}
