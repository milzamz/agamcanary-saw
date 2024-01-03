<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kriteria_m extends CI_Model {
    
    public function get($id = null)
    {
        $this->db->from('kriteria');
        if($id != null) {
            $this->db->where('id_kriteria', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_desc($params)
    {
        $query = "SELECT *, kriteria.nama_kriteria FROM detail_nilai join kriteria on detail_nilai.id_kriteria = kriteria.id_kriteria WHERE detail_nilai.id_kriteria =?";
        return $this->db->query($query,$params)->result_array();
    }

    public function editdeskripsi($post)
    {
        $params = [
            'des' => $post['deskripsi']
        ];
        $this->db->where('id_detail', $post['id_detail']);
        $this->db->update('detail_nilai', $params);
    }

    public function edit_desc($params)
    {
        $query = "SELECT *, kriteria.nama_kriteria FROM  detail_nilai join kriteria on detail_nilai.id_kriteria = kriteria.id_kriteria WHERE detail_nilai.id_detail =?";
        return $this->db->query($query,$params)->result_array();
    }

    public function get_alldesc()
    {
        $query = "SELECT * FROM detail_nilai join kriteria on detail_nilai.id_kriteria = kriteria.id_kriteria";
        return $this->db->query($query)->result_array();
    }


    public function add($post)
    {
        $params = [
            'nama_kriteria' => $post['nama_kriteria'],
            'sifat' => $post['sifat'],
            'bobot' => $post['bobot'],        ];
        $this->db->insert('kriteria', $params);
    }

    public function cekbobot()
    {
        return $this->db->query("SELECT sum(bobot) as b from kriteria")->result_array();
    }

    public function edit($post)
    {
        $params = [
            'nama_kriteria' => $post['nama_kriteria'],
            'sifat' => $post['sifat'],
            'bobot' => $post['bobot']
        ];
        $this->db->where('id_kriteria', $post['id']);
        $this->db->update('kriteria', $params);
    }

    // public function del($id)
    // {
    //     $this->db->where('kriteria_id', $id);
    //     $this->db->delete('kriteria');
    // }

}
