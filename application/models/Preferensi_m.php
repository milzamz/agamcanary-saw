<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Preferensi_m extends CI_Model {
    
    public function get()
    {
        return $this->db->query("SELECT a.kenari_id, a.nama_kenari, a.jenis_kelamin, a.gambar, a.kicau, a.umur_kenari, b.jenis, a.keterangan, (C1*(select bobot from kriteria where id_kriteria = 1)/100)+(C2*(select bobot from kriteria where id_kriteria = 2)/100)+(C3*(select bobot from kriteria where id_kriteria = 3)/100)+(C4*(select bobot from kriteria where id_kriteria = 4)/100) as p from normalisasi join kenari a using(kenari_id) join jenis_kenari b on a.jenis_kenari=b.id_jenis order by p desc;")->result_array();
    }

    public function getpref()
    {
        return $this->db->query("SELECT a.kenari_id, a.nama_kenari, a.jenis_kelamin, a.gambar, a.kicau, a.umur_kenari, b.jenis, a.keterangan, (C1*(select bobot from kriteria where id_kriteria = 1)/100)+(C2*(select bobot from kriteria where id_kriteria = 2)/100)+(C3*(select bobot from kriteria where id_kriteria = 3)/100)+(C4*(select bobot from kriteria where id_kriteria = 4)/100) as p from normalisasi join kenari a using(kenari_id) join jenis_kenari b on a.jenis_kenari=b.id_jenis;")->result_array();
    }

    public function get_kjs()
    {
        return $this->db->query("SELECT normalisasi.kenari_id, normalisasi.nama_kenari, C1 FROM `normalisasi` JOIN kenari on kenari.kenari_id=normalisasi.kenari_id WHERE kenari.jenis_kelamin=1 ORDER BY C1 desc;")->result_array();
    }
    
    public function get_kbs()
    {
        return $this->db->query("SELECT normalisasi.kenari_id, normalisasi.nama_kenari, C1 FROM `normalisasi` JOIN kenari on kenari.kenari_id=normalisasi.kenari_id WHERE kenari.jenis_kelamin=2 ORDER BY C1 desc;")->result_array();
    }

    public function get_kjp()
    {
        return $this->db->query("SELECT normalisasi.kenari_id, normalisasi.nama_kenari, C2 FROM `normalisasi` JOIN kenari on kenari.kenari_id=normalisasi.kenari_id WHERE kenari.jenis_kelamin=1 ORDER BY C2 desc;")->result_array();
    }
    
    public function get_kbp()
    {
        return $this->db->query("SELECT normalisasi.kenari_id, normalisasi.nama_kenari, C2 FROM `normalisasi` JOIN kenari on kenari.kenari_id=normalisasi.kenari_id WHERE kenari.jenis_kelamin=2 ORDER BY C2 desc;")->result_array();
    }

    public function get_kjw()
    {
        return $this->db->query("SELECT normalisasi.kenari_id, normalisasi.nama_kenari, C4 FROM `normalisasi` JOIN kenari on kenari.kenari_id=normalisasi.kenari_id WHERE kenari.jenis_kelamin=1 ORDER BY C4 desc;")->result_array();
    }
    
    public function get_kbw()
    {
        return $this->db->query("SELECT normalisasi.kenari_id, normalisasi.nama_kenari, C4 FROM `normalisasi` JOIN kenari on kenari.kenari_id=normalisasi.kenari_id WHERE kenari.jenis_kelamin=2 ORDER BY C4 desc;")->result_array();
    }



    public function geta()
    {
        $this->db->query("SELECT a.nama_kenari, (C1*(select bobot from kriteria where id_kriteria = 1)/100)+(C2*(select bobot from kriteria where id_kriteria = 2)/100)+(C3*(select bobot from kriteria where id_kriteria = 3)/100)+(C4*(select bobot from kriteria where id_kriteria = 4)/100) as p from normalisasi join kenari a using(kenari_id) order by p desc;");
        return $this->db->get();

    }

    public function get_nilai($params)
    {
        $query = "SELECT bobot_kriteria.nilai, detail_nilai.des FROM bobot_kriteria INNER JOIN kenari on kenari.kenari_id = bobot_kriteria.kenari_id join detail_nilai on bobot_kriteria.nilai = detail_nilai.nilai WHERE bobot_kriteria.id_kriteria = detail_nilai.id_kriteria and bobot_kriteria.kenari_id =?";
        return $this->db->query($query,$params)->result_array();
    }

    public function save()
    {
        $this->db->query("INSERT INTO hasil (kenari_id, nama_kenari, jenis_kelamin ,nilai_p) SELECT a.kenari_id, a.nama_kenari, a.jenis_kelamin, (C1*(select bobot from kriteria where id_kriteria = 1)/100)+(C2*(select bobot from kriteria where id_kriteria = 2)/100)+(C3*(select bobot from kriteria where id_kriteria = 3)/100)+(C4*(select bobot from kriteria where id_kriteria = 4)/100) as p from normalisasi join kenari a using(kenari_id) order by p desc");
    }

    public function get_hasil($dari, $ke)
    {
        $query = "SELECT * FROM hasil WHERE (created BETWEEN '".$dari."' AND '".$ke."')";
        return $this->db->query($query)->result_array();
    }

    public function get_allhasil()
    {
        $query = "SELECT * FROM hasil order by created desc";
        return $this->db->query($query)->result_array();
    }
}
