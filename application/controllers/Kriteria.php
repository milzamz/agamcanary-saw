<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

	function __construct()
    {
        parent:: __construct();
        check_not_login();
		$this->check_admin();
        $this->load->model('kriteria_m');
	   
    }

	public function index()
	{
		$data['row'] = $this->kriteria_m->get();
		$data['judul'] = "Agam Canary | Kriteria";
		$data['bobot'] = $this->kriteria_m->cekbobot();
		$this->template->load('template', 'kriteria/kriteria_data', $data);
	}

	public function des()
	{
		$data['desc'] = $this->kriteria_m->get_alldesc();
		$data['row'] = $this->kriteria_m->get();
		$data['bobot'] = $this->kriteria_m->cekbobot();
		$data['judul'] = "Agam Canary | Deskripsi Kriteria";
		$this->template->load('template', 'kriteria/des_kriteria', $data);
	}

	public function tampil_des()
	{
		$desc = $this->kriteria_m->get_alldesc();
		$no = 1;
		?>
        		<?php foreach($desc as $data) {?>
						<tr>
							<td><?= $no++?>.</td>
							<td><?= $data['nama_kriteria']?></td>
							<td><?= ucfirst($data['nilai'])?></td>
							<td><?= ucfirst($data['des'])?></td>
							<td class="text-center">
							<a class="btn btn-primary btn-xs" data-toggle="modal" onclick="showdetail(<?= $data['id_detail']?>)" href="#modaleditdes"><i class="fa fa-pencil-alt"></i>Edit</a>
							</td>
						</tr>
					<?php } ?>
						
						<?php
	}

	public function get_des()
	{
		if($this->input->post('id_kriteria') == 0){
			$this->tampil_des();
		}
		$desc = $this->kriteria_m->get_desc($this->input->post('id_kriteria'));
		$no = 1;
		?>
        		<?php foreach($desc as $data) {?>
						<tr>
							<td><?= $no++?>.</td>
							<td><?= $data['nama_kriteria']?></td>
							<td><?= ucfirst($data['nilai'])?></td>
							<td><?= ucfirst($data['des'])?></td>
							<td class="text-center">
							<a class="btn btn-primary btn-xs" data-toggle="modal" onclick="showdetail(<?= $data['id_detail']?>)" href="#modaleditdes"><i class="fa fa-pencil-alt"></i>Edit</a>
							</td>
						</tr>
					<?php } ?>
						
						<?php
	}
	
	public function add()
	{
		$kriteria = new stdClass();
		$kriteria->kriteria_id = null;
		$kriteria->nama_kriteria = null;
		$kriteria->sifat = null;
		$kriteria->bobot = null;
		$data = array(
			'page' => 'add',
			'row' => $kriteria
		);
		$data['judul'] = "Agam Canary | Kriteria";
		$this->template->load('template', 'kriteria/kriteria_form', $data);
	}

	public function edit($id)
	{
		$query = $this->kriteria_m->get($id);
		if($query->num_rows() > 0 ){
			$kriteria = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $kriteria
			);
			$data['judul'] = "Agam Canary | Kriteria";
			$this->template->load('template', 'kriteria/kriteria_form', $data);
		} else {
			$this->session->set_flashdata('gagal', 'Data tidak ditemukan');
			redirect('kriteria');
		}
	}

	public function edit_des()
	{
		$post = $this->input->post(null, true);
		$this->kriteria_m->editdeskripsi($post);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
			redirect('kriteria/des');
		}
	}

	public function process()
	{
		$post = $this->input->post(null, true);
		if(isset($_POST['edit'])){
			$this->kriteria_m->edit($post);
		}
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
			redirect('kriteria');
		}
	}

	public function modaleditdesc()
	{
	$kriteria = $this->kriteria_m->edit_desc(array($this->input->post('id_detail')));
	?>
		<form action="<?= site_url('kriteria/edit_des')?>" method="post">
        <div class="modal-header">
              <h4 class="modal-title">Edit Deskripsi <label style="color: yellowgreen;"><?=$kriteria[0]['nama_kriteria']?></label></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
				<input type="hidden" name="id_detail" value="<?=$kriteria[0]['id_detail']?>">
				<input type="text" name="deskripsi"
								value="<?=$kriteria[0]['des']?>" class="form-control">
            </div>
			<div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div> 
<?php
      
}

	public function check_admin()
{
	if ($this->fungsi->user_login()->level == 1) {
		$this->session->set_flashdata('eror', 'Anda tidak memiliki akses ke halaman ini');
		redirect('dashboard');
	}
}
}