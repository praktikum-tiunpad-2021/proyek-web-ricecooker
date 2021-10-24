<?php

namespace App\Models;

use CodeIgniter\Model;

class tiketModel extends Model
{


    public function tampilkan_tiket()
    {
        return $this->db->table('tiket')
            ->select('*')
            ->join('penumpang', 'tiket.nomor_id = penumpang.nomor_id')
            ->join('rute', 'tiket.nomor_rute = rute.nomor_rute')
            ->join('maskapai', 'tiket.kode_maskapai = maskapai.kode_maskapai')
            ->get()->getResultArray();
    }

    function tambah_tiket($data)
    {
        $this->db->table('penumpang')->insert($data);
    }

    function tambah_tiket2($data)
    {
        $this->db->table('tiket')->insert($data);
    }

    function hapus_tiket($data)
    {

        $this->db->table('tiket')
            ->delete(array('nomor_id' => $data));

        $this->db->table('penumpang')
            ->delete(array('nomor_id' => $data));
    }

    public function ubah_tiket($data)
    {
        return $this->db->table('tiket')
            ->select('*')
            ->join('penumpang', 'tiket.nomor_id = penumpang.nomor_id')
            ->join('rute', 'tiket.nomor_rute = rute.nomor_rute')
            ->join('maskapai', 'tiket.kode_maskapai = maskapai.kode_maskapai')
            ->where('tiket.nomor_tiket', $data)
            ->get()->getResultArray();
    }

    public function ubah_tiket2($data, $nomor_id)
    {

        $this->db->table('tiket')->update($data, array('nomor_id' => $nomor_id));
    }

    public function ubah_tiket3($data, $nomor_id)
    {

        $this->db->table('penumpang')->update($data, array('nomor_id' => $nomor_id));
    }
}
