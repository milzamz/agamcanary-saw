<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_m extends CI_Model {
    
    public function get($id = null)
    {
        $this->db->from('jenis_kenari');
        if($id != null) {
            $this->db->where('id_jenis', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'jenis' => $post['nama_jenis']
        ];
        $this->db->insert('jenis_kenari', $params);
    }

    public function edit($post)
    {
        $params = [
            'jenis' => $post['nama_jenis']
        ];
        $this->db->where('id_jenis', $post['id']);
        $this->db->update('jenis_kenari', $params);
    }
    public function del($id)
    {
        $this->db->where('id_jenis', $id);
        $this->db->delete('jenis_kenari');
    }
}
