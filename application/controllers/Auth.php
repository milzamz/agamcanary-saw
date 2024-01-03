<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		check_already_login();
		$this->load->view('login');
	}
	
	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$this->load->model('user_m');
				$query = $this->user_m->login($post);
				if ($query->num_rows() > 0) {
					$row = $query->row();
					$params = array(
						'userid' => $row->user_id,
						'level' => $row->level
					);
					$this->session->set_userdata($params);
					$this->session->set_flashdata('login', 'Anda Berhasil Login');
					redirect('dashboard');
					
				} else {
					$this->session->set_flashdata('gagal', 'Username atau Password Salah!!');
					redirect('auth/login');	
				}
		}
	}

	public function logout()
	{
		$params = array('userid', 'level');
		$this->session->unset_userdata($params);
		redirect('auth/login');
	}
}
