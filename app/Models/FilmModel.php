<?php

namespace App\Models;

use CodeIgniter\Model;

class FilmModel extends Model
{
    protected $table ="film";
    protected $primaryKey = "id";
    protected $UseAutoIncrement = true;
    protected $allowedFields = ['nama_film', 'id_genre', 'duration', 'cover'];

    public function getAllData(){
        return $this->join('genre', 'film.id_genre = genre.id_genre')->findAll();
    }
    public function getDataByID($id)
    {
        return $this->find($id);
    }
    public function getFilm()
   {
    $data = [
            [
                "nama_film" => "Anak Titipan Setan",
                "genre" => "Horor",
                "duration" => "1 Jam 37 Menit"
            ],
            [
                "nama_film" => "Adagium",
                "genre" => "action",
                "duration" => "1 Jam 20 Menit"
            ],
            [
                "nama_film" => "Sewu Dino",
                "genre" => "horror",
                "duration" => "2 Jam 14 Menit"
            ],
            [
                "nama_film" => "Pengabdi Setan",
                "genre" => "horror",
                "duration" => "2 Jam 10 Menit"
            ],
            [
                "nama_film" => "Cek Toko Sebelah",
                "genre" => "comedy",
                "duration" => "1 Jam 40 Menit"
            ],
            [
                "nama_film" => "Fast X",
                "genre" => "action",
                "duration" => "2 Jam 36 Menit"
            ],
            [
                "nama_film" => "Susah Sinyal",
                "genre" => "comedy",
                "duration" => "1 Jam 14 Menit"
            ],
            [
                "nama_film" => "Barbie",
                "genre" => "Komedi Fantasi",
                "duration" => "1 Jam 5 Menit"
            ],
            [
                "nama_film" => "The Little Mermaid",
                "genre" => "fantasy",
                "duration" => "2 Jam 1 Menit"
            ],
            [
                "nama_film" => "The Nun",
                "genre" => "horror",
                "duration" => "1 Jam 57 Menit"
            ],
        ];

        return $data; 
    }
        
    }
       