<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bobot extends CI_Controller {

	function __construct()
    {
        parent:: __construct();
        check_not_login();
        $this->load->model('bobot_m');
        $this->load->model('kenari_m');
        $this->load->library('form_validation');
	   
    }
    // public function get($id = null)
    // {
    //     $this->db->from('bobot_kriteria');
    //     if($id != null) {
    //         $this->db->where('kenari_id', $id);
    //     }
    //     $query = $this->db->get();
    //     return $query;
    // }
	public function index()
	{
		$data['row'] = $this->bobot_m->get();
        $data['judul'] = "Agam Canary | Rating Kecocokan";
        $data['nav'] = "active";
		$this->template->load('template', 'bobot/bobot_data', $data);
	}

    public function clear_data()
    {
        $this->bobot_m->clear();
        $this->session->set_flashdata('success', 'Data berhasil dibersihkan!!');
        redirect('bobot');
    }
	
    public function edit($id)
    {
        $this->form_validation->set_rules('suara', 'Suara', 'required');
        $this->form_validation->set_rules('postur', 'Postur Tubuh', 'required');
        $this->form_validation->set_rules('umur', 'Umur', 'required');
        $this->form_validation->set_rules('warna', 'Warna', 'required');
        if($this->form_validation->run() == false){
        $query = $this->bobot_m->geta($id);
        $kenari = $this->kenari_m->get($id);
        if($query){
            $data['row'] = $query;
            $data['kenari'] = $kenari -> row();
            $data['suara'] = $this->bobot_m->getSuara();
            $data['postur'] = $this->bobot_m->getPostur();
            $data['warna'] = $this->bobot_m->getWarna();
            $this->template->load('template', 'bobot/bobot_edit', $data);
        } else {
            $this->session->set_flashdata('gagal', 'Data tidak ditemukan!!');
            redirect('bobot');
        }
    } else {
        $post = $this->input->post(null, true);
        $this->bobot_m->edit1($post);
        $this->bobot_m->edit2($post);
        $this->bobot_m->edit3($post);
        $this->bobot_m->edit4($post);
        $this->session->set_flashdata('success', 'Data berhasil disimpan!!');
        redirect('bobot');
    }
    }
    
    public function process()
	{
		$post = $this->input->post(null, true);
		if(isset($_POST['add'])){
            $this->bobot_m->add($post);
		} else if(isset($_POST['edit'])){
			$this->bobot_m->edit($post);
		}
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('bobot');
		}
	}

    public function del($id)
	{
		$this->bobot_m->del($id);
		if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            redirect('bobot');
        }

	}
}
