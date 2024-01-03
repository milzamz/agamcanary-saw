<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis extends CI_Controller {

	function __construct()
    {
        parent:: __construct();
        check_not_login();
		$this->check_admin();
        $this->load->model('jenis_m');
	   
    }

	public function check_admin()
	{
		if ($this->fungsi->user_login()->level == 1) {
			$this->session->set_flashdata('eror', 'Anda tidak memiliki akses ke halaman ini');
			redirect('dashboard');
		}
	}
	public function index()
	{
		$data['row'] = $this->jenis_m->get();
		$data['judul'] = "Agam Canary | Jenis";
		$this->template->load('template', 'jenis/jenis_data', $data);
	}
	
	public function add()
	{
		$jenis = new stdClass();
		$jenis->id_jenis = null;
		$jenis->jenis = null;
		$data = array(
			'page' => 'add',
			'row' => $jenis
		);
		$data['judul'] = "Agam Canary | Jenis";
		$this->template->load('template', 'jenis/jenis_form', $data);
	}
	
	public function edit($id)
	{
		$query = $this->jenis_m->get($id);
		if($query->num_rows() > 0 ){
			$jenis = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $jenis
			);
			$data['judul'] = "Agam Canary | Jenis";
			$this->template->load('template', 'jenis/jenis_form', $data);
		} else {
			$this->session->set_flashdata('gagal', 'Data tidak ditemukan!!');
			redirect('jenis');
		}
	}

	public function process()
	{
		$post = $this->input->post(null, true);
		if(isset($_POST['add'])){
			$this->jenis_m->add($post);
		} else if(isset($_POST['edit'])){
			$this->jenis_m->edit($post);
		}
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		}
		redirect('jenis');
	}

	public function del($id)
	{
		$this->jenis_m->del($id);
		if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
		redirect('jenis');
	}
}
