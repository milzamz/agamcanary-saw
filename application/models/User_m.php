<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {

    

    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function cekusername($post)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->from('user');
        if($id != null) {
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function gets($user_id)
    {
        $this->db->from('user');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        return $query;
    }


    public function add($post)
    {
        $params['nama'] = $post['fullname'];
        $params['username'] = $post['username'];
        $params['password'] = sha1($post['password']);
        $params['alamat'] = $post['alamat'] != "" ? $post['alamat'] : null;
        $params['level'] = $post['level'];
        $this->db->insert('user', $params);
    }
    
    public function edit($post)
    {
        $params['nama'] = $post['fullname'];
        $params['username'] = $post['username'];
        if(!empty($post['password'])) {
            $params['password'] = sha1($post['password']);
        }
        $params['alamat'] = $post['alamat'] != "" ? $post['alamat'] : null;
        $params['level'] = $post['level'];
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('user', $params);
    }

    public function del($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('user');
    }

    public function countUser() 
    {
        return $this->db->query("SELECT count(user_id) as jml from user")->result_array();
    }

}
