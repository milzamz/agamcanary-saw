<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct()
    {
        parent:: __construct();
        check_not_login();
        $this->load->model('user_m');
        $this->load->library('form_validation');
	   
    }

	public function index()
	{
        if ($this->fungsi->user_login()->level == 1) {
            $this->session->set_flashdata('gagal', 'anda tidak memiliki akses ke halaman ini!!');
			    redirect('user/userSetting');
        } else {
        $data['row'] = $this->user_m->get();
        $data['judul'] = "Agam Canary | Data User";
     	$this->template->load('template', 'user/user_data', $data);   
        }
    }
    
    public function userSetting()
	{
        $data['row'] = $this->user_m->get();
        $data['judul'] = "Agam Canary | User Setting";
     	$this->template->load('template', 'user/user_setting', $data);
	}

    
    public function user_add()
    {
        $this->form_validation->set_rules('fullname', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
        $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]',
        array('matches' => '%s tidak sesuai dengan Password!'));
        $this->form_validation->set_rules('level', 'Level', 'required');  
        
        $this->form_validation->set_message('required', '%s masih kosong, silakan diisi!');
        $this->form_validation->set_message('min_length', '%s minimal 4 karakter!');
        $this->form_validation->set_message('is_unique', '%s sudah dipakai, silakan ganti!');

        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
        
        if($this->form_validation->run() == false){
            $data['judul'] = "Agam Canary | Data User";
            $this->template->load('template', 'user/user_add', $data);
        } else {
            $post = $this->input->post(null, true);
            $this->user_m->add($post);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Data berhasil disimpan!!');
			    redirect('user');
            }
        }
    }

    public function del($id)
    {
        $this->user_m->del($id);

        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success', 'Data berhasil dihapus!!');
            redirect('user');
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('fullname', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|callback_username_check');
        if($this->input->post('password')){
            $this->form_validation->set_rules('password', 'Password', 'min_length[4]');
            $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'matches[password]', array('matches' => '%s tidak sesuai dengan Password!'));}
        if($this->input->post('passconf')){
            $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'matches[password]',array('matches' => '%s tidak sesuai dengan Password!'));}
        $this->form_validation->set_rules('level', 'Level', 'required');  
        $this->form_validation->set_message('required', '%s masih kosong, silakan diisi!');
        $this->form_validation->set_message('min_length', '%s minimal 4 karakter!');
        $this->form_validation->set_message('is_unique', '%s sudah dipakai, silakan ganti!');
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
        if($this->form_validation->run() == false){
            $query = $this->user_m->get($id);
            if($query->num_rows() > 0){
                $data['row'] = $query -> row(); $data['judul'] = "Agam Canary | Data User";
                $this->template->load('template', 'user/user_edit', $data);} else {
                $this->session->set_flashdata('gagal', 'Data tidak ditemukan!!');redirect('user');} } else {
            $post = $this->input->post(null, true);
            $this->user_m->edit($post);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Data berhasil disimpan!!');
			    if ($this->fungsi->user_login()->level == 1) {
                    $this->session->set_flashdata('success', 'Data berhasil disimpan!!');
                        redirect('user/userSetting');
                } else {
                redirect('user');
            }
        }
        }
    }
    
    function username_check()
    {
        $post = $this->input->post(null, true);
        $query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND user_id != '$post[user_id]'");
        if($query->num_rows() > 0){
            $this->form_validation->set_message('username_check', '%s ini sudah dipakai, silakan ganti!');
            return false;
        } else {
            return true;
        }
        
    }

}
