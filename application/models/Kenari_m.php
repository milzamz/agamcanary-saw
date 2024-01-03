<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kenari_m extends CI_Model {
    
    public function get($id = null)
    {
        $this->db->select('*, jenis.jenis as jen, induk1.jenis AS induk1 , induk2.jenis AS induk2, substring(date(created), -2) as tgl, month(created) as bln, year(created) as thn,(YEAR(CURDATE( )) - YEAR(umur_kenari)) * 12 + (MONTH(CURDATE( )) - MONTH(umur_kenari)) - IF(DAYOFMONTH(CURDATE( )) < DAYOFMONTH(umur_kenari),1,0) AS k');
        $this->db->from('kenari');
        if($id != null) {
            $this->db->where('kenari_id', $id);
        }
        $this->db->join('jenis_kenari as jenis', 'jenis.id_jenis = kenari.jenis_kenari');
        $this->db->join('jenis_kenari as induk1', 'induk1.id_jenis = kenari.induk1');
        $this->db->join('jenis_kenari as induk2', 'induk2.id_jenis = kenari.induk2');
        $this->db->order_by('created', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function kenari()
    {
        return $this->db->query("SELECT *, substring(date(created), -2) as tgl, month(created) as bln, year(created) as thn,(YEAR(CURDATE( )) - YEAR(umur_kenari)) * 12 + (MONTH(CURDATE( )) - MONTH(umur_kenari)) - IF(DAYOFMONTH(CURDATE( )) < DAYOFMONTH(umur_kenari),1,0) AS k FROM kenari JOIN jenis_kenari on jenis_kenari.id_jenis=kenari.jenis_kenari ORDER BY created DESC;")->result_array();
    }

    public function get_jenis()
    {
        return $this->db->query("SELECT * from jenis_kenari")->result_array();
    }

    public function get_detail($params)
    {
        $query = "SELECT *, month(created) as bln, year(created) as thn,(YEAR(CURDATE( )) - YEAR(umur_kenari)) * 12 + (MONTH(CURDATE( )) - MONTH(umur_kenari)) - IF(DAYOFMONTH(CURDATE( )) < DAYOFMONTH(umur_kenari),1,0) AS umur_kenari FROM kenari join jenis_kenari on kenari.jenis_kenari = jenis_kenari.id_jenis WHERE kenari_id =?";
        return $this->db->query($query,$params)->result_array();
    }

    public function get_tanggal($date)
    {
        $this->db->select('*, substring(date(created), -2) as tgl, month(created) as bln, year(created) as thn');
        $this->db->from('kenari');
        $this->db->join('jenis_kenari', 'jenis_kenari.id_jenis = kenari.jenis_kenari');
        $this->db->where('date(created)', $date);
        $this->db->order_by('created', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'nama_kenari' => $post['nama_kenari'],
            'jenis_kenari' => $post['jenis_kenari'],
            'umur_kenari' => $post['umur_kenari'],
            'jenis_kelamin' => $post['jenis_kelamin'],
            'status' => $post['status'],
            'induk1' => $post['induk1'],
            'induk2' => $post['induk2'],
            'gambar' => $post['gambar'],
            'kicau' => $post['kicau'],
            'keterangan' => empty($post['keterangan']) ? null : $post['keterangan']
        ];
        $this->db->insert('kenari', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama_kenari' => $post['nama_kenari'],
            'jenis_kenari' => $post['jenis_kenari'],
            'umur_kenari' => $post['umur_kenari'],
            'jenis_kelamin' => $post['jenis_kelamin'],
            'status' => $post['status'],
            'induk1' => $post['induk1'],
            'induk2' => $post['induk2'],
            'keterangan' => empty($post['keterangan']) ? null : $post['keterangan']
        ];
        if($post['gambar'] != null){
            $params['gambar'] = $post['gambar'];
        }
        if($post['kicau'] != null){
            $params['kicau'] = $post['kicau'];
        }

        $this->db->where('kenari_id', $post['id']);
        $this->db->update('kenari', $params);
    }
    public function del($id)
    {
        $this->db->where('kenari_id', $id);
        $this->db->delete('kenari');
    }

    public function countKenariReady()
    {
        return $this->db->query("SELECT count(kenari_id) as jumlahrd from kenari where status = 1")->result_array();
    }

    public function countKenari()
    {
        return $this->db->query("SELECT count(kenari_id) as jumlah from kenari")->result_array();
    }

    public function countKenariJan()
    {
        return $this->db->query("SELECT count(kenari_id) as jan from kenari where jenis_kelamin = 1")->result_array();
    }
    public function countKenariBet()
    {
        return $this->db->query("SELECT count(kenari_id) as bet from kenari where jenis_kelamin = 2")->result_array();
    }

    public function countKenariBetReady()
    {
        return $this->db->query("SELECT count(kenari_id) as betrd from kenari where jenis_kelamin = 2 and status = 1")->result_array();
    }
    public function countKenariJanReady()
    {
        return $this->db->query("SELECT count(kenari_id) as janrd from kenari where jenis_kelamin = 1 and status = 1")->result_array();
    }

}
