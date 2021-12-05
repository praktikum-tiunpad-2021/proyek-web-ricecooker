<?php

namespace App\Controllers;

use App\Models\UserModel;

class Pages extends BaseController
{
    protected $tampilkan_data;

    public function __construct()
    {
        $this->tampilkan_data = new \App\Models\tiketModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Home'
        ];

        return view('page/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Me'
        ];

        echo view('page/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact Me',

        ];

        return view('page/contact', $data);
    }



    public function daftar_tiket()
    {
        $tiket = $this->tampilkan_data->tampilkan_tiket();

        $data = [
            'title' => 'Daftar Tiket',
            'tiket' => $tiket
        ];


        return view('page/daftar_tiket', $data);
    }

    public function tambah_tiket()
    {
        $data = [
            'title' => 'Tambah Tiket',
        ];

        return view('page/tambah_tiket', $data);
    }

    public function save()
    {


        $data = array(
            'nomor_id' => $this->request->getPost('nomor_id'),
            'nama_penumpang' => $this->request->getPost('nama_penumpang'),
            'jk' => $this->request->getPost('jk'),
            'alamat' => $this->request->getPost('alamat'),
            'notelp' => $this->request->getPost('notelp')

        );

        $data2 = array(
            'nomor_id' => $this->request->getPost('nomor_id'),
            'kode_maskapai' => $this->request->getPost('kode_maskapai'),
            'nomor_kursi' => $this->request->getPost('nomor_kursi'),
            'jamterbang' => $this->request->getPost('jamterbang'),
            'nomor_rute' => $this->request->getPost('nomor_rute'),
            'email' => session()->get('email')
        );



        $this->tampilkan_data->tambah_tiket($data);
        $this->tampilkan_data->tambah_tiket2($data2);


        return redirect()->to('pages/daftar_tiket');
    }

    public function hapus_tiket($data)
    {
        $this->tampilkan_data->hapus_tiket($data);
        return redirect()->to('pages/daftar_tiket');
    }

    public function ubah_data($data)
    {
        $tiket = $this->tampilkan_data->ubah_tiket($data);
        $dataPenumpang = [
            'title' => 'Ubah Tiket',
            'penumpang' => $tiket
        ];
        return view('page/ubah_data', $dataPenumpang);
    }

    public function ubah_data2()
    {
        $id = $this->request->getPost('nomor_id');

        $data = array(
            'nama_penumpang' => $this->request->getPost('nama_penumpang'),
            'jk' => $this->request->getPost('jk'),
            'alamat' => $this->request->getPost('alamat'),
            'notelp' => $this->request->getPost('notelp')

        );

        $data2 = array(
            'kode_maskapai' => $this->request->getPost('kode_maskapai'),
            'nomor_kursi' => $this->request->getPost('nomor_kursi'),
            'jamterbang' => $this->request->getPost('jamterbang'),
            'nomor_rute' => $this->request->getPost('nomor_rute')
        );

        $this->tampilkan_data->ubah_tiket2($data, $id);
        $this->tampilkan_data->ubah_tiket3($data2, $id);

        return redirect()->to('pages/daftar_tiket');
    }
}
