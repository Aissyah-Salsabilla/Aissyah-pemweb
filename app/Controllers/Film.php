<?php

namespace App\Controllers;

use App\Controllers\BaseController;
// step 1
use App\Models\FilmModel;
use App\Models\GenreModel;

class Film extends BaseController
{
    // step 2
    protected $film;
    protected $genre;
    
    //step 3
    public function __construct()
    {
        $this->film = new FilmModel();
        $this->genre = new GenreModel();
    }

    public function index()
    {
        $data['films'] = $this->film->getAllData();
        return view("film/index", $data);
    }

    public function all()
    {
        $data['semuafilm'] = $this->film->getAllData();
        return view("film/semuafilm", $data);
    
    }
    public function add()
    {
        $data['genre'] = $this->genre->getAllData();        
        return view("film/add", $data);
    }
    public function update($id)
    {
        $data["genre"] = $this->genre->getAllData();
        $data["errors"] = session('errors');
        $data["film"] = $this->film->getDataByID($id);
        return view("film/edit", $data);
    }
    public function destroy($id)
    {
        $this->film->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus.');
        return redirect()->to('/film');
    }
    public function store()
    {
        $validation = $this->validate([
            'nama_film' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Nama Film Harus diisi'
                ]
            ],
            'id_genre'  => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Genre Harus diisi'
                ]
            ],
            'duration'  => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Durasi Harus diisi'
                ]
            ],
            'cover'     => [
                'rules' => 'uploaded[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]|max_size[cover,2048]',
                'errors' => [
                    'uploaded' => 'Kolom Cover harus berisi file.',
                    'mime_in' => 'Tipe file pada Kolom Cover harus berupa JPG, JPEG, atau PNG',
                    'max_size' => 'Ukuran file pada Kolom Cover melebihi batas maksimum'
                ]
            ]
        ]);

        if (!$validation) {
            $errors = \Config\Services::validation()->getErrors();

            return redirect()->back()->withInput()->with('errors', $errors);
        }
        $image = $this->request->getFile('cover');
        $imageName = $image->getRandomName();
        $image->move(ROOTPATH . 'public/assets/cover/', $imageName);

        $data = [
            'nama_film' => $this->request->getPost('nama_film'),
            'id_genre' => $this->request->getPost('id_genre'),
            'duration' => $this->request->getPost('duration'),
            'cover' => $imageName,
        ];
        $this->film->save($data);
        session()->setFlashdata('success', 'Data berhasil disimpan.'); // tambahkan ini
        return redirect()->to('/film');
    }
  
    public function edit()
    {
        $validation = $this->validate([
            'nama_film' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Nama Film Harus diisi'
                ]
            ],
            'id_genre'  => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Genre Harus diisi'
                ]
            ],
            'duration'  => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Durasi Harus diisi'
                ]
            ],
            'cover'     => [
                'rules' => 'mime_in[cover,image/jpg,image/jpeg,image/png]|max_size[cover,2048]',
                'errors' => [
                    'mime_in' => 'Tipe file pada Kolom Cover harus berupa JPG, JPEG, atau PNG',
                    'max_size' => 'Ukuran file pada Kolom Cover melebihi batas maksimum'
                ]
            ]
        ]);

        if (!$validation) {
            $errors = \Config\Services::validation()->getErrors();

            return redirect()->back()->withInput()->with('errors', $errors);
        }
        // ambil data lama
        $film = $this->film->find($this->request->getPost('id'));

        // tambahkan request id
        $data =[
            'id' => $this->request->getPost('id'),
            'nama_film' => $this->request->getPost('nama_film'),
            'id_genre' => $this->request->getPost('id_genre'),
            'duration' => $this->request->getPost('duration'),
        ];

        // cek apakah ada cover yang di upload
        $cover = $this->request->getFile('cover');
        if ($cover->isValid() && !$cover->hasMoved()){
            //generate nama file yang unik
            $imageName = $cover->getRandomName();
            //pindahkan dile ke direktori penyimpanan
            $cover->move(ROOTPATH . 'public/assets/cover/', $imageName);
            //hapus file gambar lama jika ada
            if($film['cover']) {
                unlink(ROOTPATH . 'public/assets/cover/'. $film['cover']);
            }
            //jika ada tambahkan array cover pada variable $data
            $data['cover'] = $imageName;
        }

        $this->film->save($data);
        // ubah pesannya
        session()->setFlashdata('success', 'Data berhasil diperbarui.'); // tambahkan ini
        return redirect()->to('/film');
    }
}