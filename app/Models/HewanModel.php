<?php

namespace App\Models;

use CodeIgniter\Model;

class HewanModel extends Model
{
    public function getHewan()
   {
    $data = [
            [
                "Nama_Hewan" => "Kambing",
                "Jenis_Makanan" => "Rumput",
                "Kelompok_Hewan" => "Herbivora"
            ],
            [
                
                "Nama_Hewan" => "Kuda",
                "Jenis_Makanan" => "Rumput",
                "Kelompok_Hewan" => "Herbivora"
            ],
            [
               
                "Nama_Hewan" => "Kucing",
                "Jenis_Makanan" => "Daging/ikan",
                "Kelompok_Hewan" => "Karnivora"
            ],
            [
               
                "Nama_Hewan" => "Beruang",
                "Jenis_Makanan" => "Buah/Daging",
                "Kelompok_Hewan" => "Omnivora"
            ],
            [
               
                "Nama_Hewan" => "Srigala",
                "Jenis_Makanan" => "Daging",
                "Kelompok_Hewan" => "Karnivora"
            ],
            [
               
                "Nama_Hewan" => "Musang",
                "Jenis_Makanan" => "Buah/Daging",
                "Kelompok_Hewan" => "Omnivora"
            ],
            [
                
                "Nama_Hewan" => "Ayam",
                "Jenis_Makanan" => "Biji-bijian",
                "Kelompok_Hewan" => "Omnivora"
            ],
            [
                
                "Nama_Hewan" => "Bebek",
                "Jenis_Makanan" => "Cacing",
                "Kelompok_Hewan" => "Omnivora"
            ],
            [
                
                "Nama_Hewan" => "Tikus",
                "Jenis_Makanan" => "Tumbuhan/Daging",
                "Kelompok_Hewan" => "Omnivora"
            ],
            [
               
                "Nama_Hewan" => "Burung",
                "Jenis_Makanan" => "Biji-bijian/Serangga",
                "Kelompok_Hewan" => "Omnivora"
            ],
        ];

        return $data; 
   }
}