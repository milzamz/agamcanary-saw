<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kenari extends CI_Controller {

	function __construct()
    {
        parent:: __construct();
        check_not_login();
        $this->load->model('kenari_m');
        $this->load->model('bobot_m');
        $this->load->model('jenis_m');
	   
    }

	public function index()
	{
		$data['row'] = $this->kenari_m->get();
		$data['judul'] = "Agam Canary | Kenari";
		$data['nav'] = "active";
		$this->template->load('template', 'kenari/kenari_data', $data);
	}

	public function gagal()
	{
		$this->session->set_flashdata('gagal', 'Status kenari tidak ready');
		redirect('kenari');
	}
	
	public function add()
	{
		if ($this->fungsi->user_login()->level == 2) {
			$this->session->set_flashdata('gagal', 'Anda tidak memiliki akses ke halaman ini');
		redirect('kenari');
		
		}else{
			$kenari = new stdClass();
			$kenari->kenari_id = null;
			$kenari->nama_kenari = null;
			$kenari->jenis_kenari = null;
			$kenari->umur_kenari = null;
			$kenari->jenis_kelamin = null;
			$kenari->status = null;
			$kenari->induk1 = null;
			$kenari->induk2 = null;
			$kenari->keterangan = null;
			
			$jenis = $this->jenis_m->get();
	
			$data = array(
				'page' => 'add',
				'row' => $kenari,
				'jenis' => $jenis,
			);
			$data['judul'] = "Agam Canary | Kenari";
			$this->template->load('template', 'kenari/kenari_form', $data);	
		};
	}
	
	public function edit($id)
	{
		if ($this->fungsi->user_login()->level == 2) {
			$this->session->set_flashdata('gagal', 'Anda tidak memiliki akses ke halaman ini');
		redirect('kenari');
		
		}else{
		$query = $this->kenari_m->get($id);
		$jenis = $this->jenis_m->get();
		if($query->num_rows() > 0 ){
			$kenari = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $kenari,
				'jenis' => $jenis
			);
			$data['judul'] = "Agam Canary | Kenari";
			$this->template->load('template', 'kenari/kenari_form', $data);
		} else {
			$this->session->set_flashdata('gagal', 'Data tidak ditemukan!!');
			redirect('kenari');
		}
	}
	}

	public function bobot($id)
	{
		if ($this->fungsi->user_login()->level == 2) {
		$this->session->set_flashdata('gagal', 'Anda tidak memiliki akses ke halaman ini');
		redirect('kenari');
		}else{
		$query = $this->kenari_m->get($id);
            $cekken = $this->db->query("SELECT * FROM bobot_kriteria WHERE kenari_id = '$id'");
            if($cekken->num_rows() > 0){
                $this->session->set_flashdata('gagal', 'Data sudah ada!!');
					redirect('kenari');
            } else {
				if($query->num_rows() > 0 ){
					$kenari = $query->row();
					$suara = $this->bobot_m->getSuara();
					$postur = $this->bobot_m->getPostur();
					$warna = $this->bobot_m->getWarna();
					$data = array(
						'page' => 'add',
						'row' => $kenari,
						'suara' => $suara,
						'postur' => $postur,
						'warna' => $warna
					);
					$data['judul'] = "Agam Canary | Rating Kecocokan";
					$this->template->load('template', 'kenari/bobot_form', $data);
				} else {
					$this->session->set_flashdata('gagal', 'Data tidak ditemukan!!');
					redirect('kenari');
				}}}}

	public function process(){
		// config gambar
		$config['upload_path']          = './uploads/canary/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 2048;
		$config['file_name']             = 'kenari-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);
		$this->upload->do_upload('gambar');
		$gambar = $this->upload->data();
		//config suara 
		$configaudio['upload_path']          = './uploads/canary/suara';
		$configaudio['allowed_types']        = 'mp3|ogg|wav';
		$configaudio['max_size']             = 15360;
		$configaudio['file_name']             = 'kenari-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->upload->initialize($configaudio);
		$this->upload->do_upload('kicau');
		$kicau = $this->upload->data(); 
		$post = $this->input->post(null, true);	
		if(isset($_POST['add'])){	
		if(@$_FILES['gambar']['name'] != null){
				if($gambar){
						$post['gambar'] = $gambar['file_name'];
			} else {
			$post['gambar'] = null;
			}
		}
		if (@$_FILES['kicau']['name'] != null){
			if($kicau){
				$post['kicau'] = $kicau['file_name'];
			} else {
			$post['kicau'] = null;
			}
		}
		$this->kenari_m->add($post);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
			redirect('kenari');
		} else {
			$this->session->set_flashdata('gagal');redirect('kenari/add');
		}
	}
	 else if(isset($_POST['edit'])){
			if(@$_FILES['gambar']['name'] != null){
				if($gambar){
						$post['gambar'] = $gambar['file_name'];
			} else {
				$post['gambar'] = null;
			}
		}
		if (@$_FILES['kicau']['name'] != null){
			if($kicau){
				$post['kicau'] = $kicau['file_name'];
			} else {
				$post['kicau'] = null;
			}
		}
		$old = $this->kenari_m->get($post['id'])->row();
		$this->kenari_m->edit($post);
		if($this->db->affected_rows() > 0){
			if($post['kicau'] != null){
				$path1='./uploads/canary/suara/'.$old->kicau;
				chmod($path1, 0777);
				unlink($path1);
			};
			if($post['gambar'] != null){
				$path2='./uploads/canary/'.$old->gambar;
				chmod($path2, 0777);
				unlink($path2);
			};
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
			redirect('kenari');
		} else {
			$this->session->set_flashdata('gagal');redirect('kenari/add');
		}}
	}

	public function new()
	{
		$date = $this->input->post('tanggal');
		$data['row'] = $this->kenari_m->get_tanggal($date);
		$data['judul'] = "Agam Canary | Kenari";
		$data['nav'] = "active";
		$this->template->load('template', 'kenari/kenari_data', $data);
	}

	public function del($id)
	{
		$unlink = $this->kenari_m->get($id)->row();
		$this->kenari_m->del($id);
		if($this->db->affected_rows() > 0){
			unlink('uploads/canary/suara/'.$unlink->kicau);
			unlink('uploads/canary/'.$unlink->gambar);
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
		redirect('kenari');
	}
	
	public function get_detail()
    {
        $detail=$this->kenari_m->get_detail(array($this->input->post('kenari_id')));
        ?>
	<div class="modal-header">
			<h4 class="modal-title">Detail Nilai <label style="color: yellowgreen;"><?=$detail[0]['nama_kenari']?></label></h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	<div class="modal-body">
		<div class="card mx-auto text-center" style="width: 18rem;">
			<div class="card-body">
				<?php if($detail[0]['gambar'] != null){?>
				<img class="card-img-top" src="<?=base_url('uploads/canary/'.$detail[0]['gambar'])?>" alt="Card image cap">
				<?php } else {
					echo "<label style='color: red;' style='text-align: center;'>Gambar tidak tersedia/belum diupload!</label>";
				} ?>
				
				<audio controls="true" style="width: 250px;" autoplay>
					<source src="<?=base_url('uploads/canary/suara/'.$detail[0]['kicau'])?>" type="audio/mpeg">
				</audio>
			<p class="card-text"><?php if($detail[0]['keterangan'] != null){?>
				<?=$detail[0]['keterangan']?></th>
				<?php } else {
					echo "Tidak ada keterangan...";
				} ?></p>
			</div>
	</div>
</div>

<?php
    }

}
