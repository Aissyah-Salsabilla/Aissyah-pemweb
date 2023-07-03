<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HewanModel;

class Hewan extends BaseController
{
    protected $hewan;
    
    public function __construct()
    {
        $this -> hewan = new HewanModel();
    }

    public function index()
    {
        $data['hewans'] = ($this -> hewan -> getHewan());
        return view("hewan/index", $data);
  
    }
}

?>
