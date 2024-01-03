<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bobot_m extends CI_Model {
    
    public function get()
    {
        $this->db->select('substring(date(bobot_kriteria.created), -2) as tgl, month(bobot_kriteria.created) as bln, year(bobot_kriteria.created) as thn, bobot_kriteria.kenari_id, kenari.nama_kenari , kenari.jenis_kelamin, sum(nilai*(1-abs(sign(id_kriteria-1)))) as K1, sum(nilai*(1-abs(sign(id_kriteria-2)))) as K2, sum(nilai*(1-abs(sign(id_kriteria-3)))) as K3, sum(nilai*(1-abs(sign(id_kriteria-4)))) as K4 from bobot_kriteria INNER join kenari on bobot_kriteria.kenari_id = kenari.kenari_id group by kenari_id order by bobot_kriteria.created desc');
        $query = $this->db->get();
        return $query;
    }

    public function clear()
    {
        $this->db->truncate('bobot_kriteria');
    }

    public function geta($id = null)
    {
        $this->db->from('bobot_kriteria');
        $this->db->where('kenari_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getSuara()
    {
        $this->db->from('detail_nilai');
        $this->db->where('id_kriteria', 1 );
        $query = $this->db->get();
        return $query;
    }

    public function getPostur()
    {
        $this->db->from('detail_nilai');
        $this->db->where('id_kriteria', 2 );
        $query = $this->db->get();
        return $query;
    }

    public function getWarna()
    {
        $this->db->from('detail_nilai');
        $this->db->where('id_kriteria', 4 );
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = array(
            array(
                    'kenari_id' => $post['id'],
                    'id_kriteria' => 1,
                    'nilai' => $post['suara']
            ),
            array(
                    'kenari_id' => $post['id'],
                    'id_kriteria' => 2,
                    'nilai' => $post['postur']
             ),
             array(
                    'kenari_id' => $post['id'],
                    'id_kriteria' => 3,
                    'nilai' => $post['umur']
            ),
            array(
                    'kenari_id' => $post['id'],
                    'id_kriteria' => 4,
                    'nilai' => $post['warna']
            ),
        );
    $this->db->insert_batch('bobot_kriteria', $params);
    }

    public function edit1($post)
    {
        $ken = $post['id'];
        // $this->db->query("UPDATE bobot_kriteria SET nilai=". $post['suara'] ." WHERE kenari_id=".$ken."AND id_kriteria=1");
        $this->db->set('nilai', $post['suara']);
          $this->db->where('kenari_id', $ken);
        $this->db->where('id_kriteria', 1);
        $this->db->update('bobot_kriteria');
    }
    public function edit2($post)
    {
        $ken = $post['id'];
        // $this->db->query("UPDATE bobot_kriteria SET nilai=". $post['postur'] ." WHERE kenari_id=".$ken."AND id_kriteria=2");
        $this->db->set('nilai', $post['postur']);
          $this->db->where('kenari_id', $ken);
        $this->db->where('id_kriteria', 2);
        $this->db->update('bobot_kriteria');
    }
    public function edit3($post)
    {
        $ken = $post['id'];
        // $this->db->query("UPDATE bobot_kriteria SET nilai=". $post['umur'] ." WHERE kenari_id=".$ken."AND id_kriteria=3");
        $this->db->set('nilai', $post['umur']);
          $this->db->where('kenari_id', $ken);
        $this->db->where('id_kriteria', 3);
        $this->db->update('bobot_kriteria');

           
    }
    public function edit4($post)
    {
        $ken = $post['id'];
        // $this->db->query("UPDATE bobot_kriteria SET nilai=". $post['warna'] ." WHERE kenari_id=".$ken."AND id_kriteria=4");
        $this->db->set('nilai', $post['warna']);
        $this->db->where('kenari_id', $ken);
      $this->db->where('id_kriteria', 4);
      $this->db->update('bobot_kriteria');
            
    }

    public function del($id)
    {
        $this->db->where('kenari_id', $id);
        $this->db->delete('bobot_kriteria');
    }
}
