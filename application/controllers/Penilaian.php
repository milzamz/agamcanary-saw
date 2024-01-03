<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {

	function __construct()
    {
        parent:: __construct();
        check_not_login();
        $this->load->model('penilaian_m');
        $this->load->model('kenari_m');
        $this->load->model('bobot_m');
        $this->load->model('preferensi_m');
	   
    }

	public function index()
	{
        $this->cnorm();
		$data['row'] = $this->penilaian_m->get();
        $data['judul'] = "Agam Canary | Normalisasi";
		$this->template->load('template', 'penilaian/penilaian_data', $data);
	}

    public function prefer()
    {
        $this->cnorm();
		$data['pref'] = $this->preferensi_m->getpref();
        $data['judul'] = "Agam Canary | Preferensi";
		$this->template->load('template', 'penilaian/preferensi_data', $data);
    }

    public function preferensi()
    {
        $this->cnorm();
		$data['kjs'] = $this->preferensi_m->get_kjs();
		$data['kbs'] = $this->preferensi_m->get_kbs();
        $data['kjp'] = $this->preferensi_m->get_kjp();
		$data['kbp'] = $this->preferensi_m->get_kbp();
        $data['kjw'] = $this->preferensi_m->get_kjw();
		$data['kbw'] = $this->preferensi_m->get_kbw();
		$data['pref'] = $this->preferensi_m->get();
        $data['judul'] = "Agam Canary | Perangkingan";
		$this->template->load('template', 'penilaian/preferensi_datanew', $data);
    }

    public function get_nilai()
    {
        $kenari=$this->kenari_m->get_detail(array($this->input->post('kenari_id')));
        $detail=$this->preferensi_m->get_nilai(array($this->input->post('kenari_id')));
        ?>
        <div class="modal-header">
              <h4 class="modal-title">Detail Nilai <label style="color: yellowgreen;"><?=$kenari[0]['nama_kenari']?></label></h4>
              <div class="row">
              <a href="<?=site_url('laporan/cetakperkenari/'.$kenari[0]['kenari_id'])?>" target="_blank" class="btn btn-dark">
						<i class="fa fa-print"></i>Cetak
					</a>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
            </div>
            <div class="modal-body">
            <table class="table no-border" style="width: 400px; margin-top:0px;" align="center">
            <tr>
                <td rowspan="3" style="width: 200px;"><?php if($kenari[0]['gambar'] != null){?>
							<img src="<?=base_url('uploads/canary/'.$kenari[0]['gambar'])?>" style="width:200px">
						<?php } else {?>
							<img src="<?=base_url('uploads/canary/default.jpg')?>" style="width:200px">
						<?php } ?></td>
                <td>Jenis</td>
                <td style="width: 2px;">:</td>
                <td><?=$kenari[0]['jenis']?></td>
            </tr>
            <tr>
             
                <td style="width: 40px;">JK</td>
                <td style="width: 2px;">:</td>
                <td><?=$kenari[0]['jenis_kelamin']== 1 ? "Jantan" : "Betina" ?></td>
            </tr>
            <tr>
                
                <td style="width: 40px;">Umur</td>
                <td style="width: 2px;">:</td>
                <td><?=$kenari[0]['umur_kenari']?> Bulan</td>
            </tr>
            <tr>
                <td colspan="4" align="center"><?php if($kenari[0]['keterangan'] != null){?>	
					<?=$kenari[0]['keterangan']?></td>
					<?php } else {
							echo "Tidak ada keterangan...";
						 } ?></td>
            </tr>
            <?php if ($this->fungsi->user_login()->level == 1){?>
                <tr>
                    <td colspan="4" align="center"><?php if($kenari[0]['kicau'] != null){?>	
                        <audio controls="true" class="audio">
                                <source src="<?=base_url('uploads/canary/suara/'.$kenari[0]['kicau'])?>" type="audio/mpeg">
                                </audio>
                        <?php } else {
                                echo "Tidak ada suara...";
                             } ?></td>
                </tr>
            <?php } else {?>
                
            <?php } ?>
        </table>

        <table class="table no-border" style="width: 440px; font-size: 14px;" style="font-style: normal;" align="center" >
        
            <tr  style="background-color: gray;">
                <td style="width: 25px;">Kriteria</td>
                <td style="width: 2px;"></td>
                <td>Deskripsi Nilai</td>
            </tr>
                <tr>
                    <td>Suara</td>
                    <td>:</td>
                    <td style="text-align: justify;"><?= ucfirst($detail[0]['des'])?></td>
                </tr>
                <tr>
                    <td>Postur</td>
                    <td>:</td>
                    <td style="text-align: justify;"><?=ucfirst($detail[1]['des'])?></td>
                </tr>
                <tr>
                    <td>Umur</td>
                    <td>:</td>
                    <td style="text-align: justify;"><?=ucfirst($detail[2]['des'])?></td>
                </tr>
                <tr>
                    <td>Warna</td>
                    <td>:</td>
                    <td style="text-align: justify;"><?=ucfirst($detail[3]['des'])?></td>

                </tr>
                </tbody>
        </table>      
            </div>
            
        <?php
    }

    public function get_gambar()
    {
        $kenari=$this->kenari_m->get_detail(array($this->input->post('kenari_id')));
        $detail=$this->preferensi_m->get_nilai(array($this->input->post('kenari_id')));
        ?>
        <div class="modal-header">
              <h4 class="modal-title"><label style="color: yellowgreen;"><?=$kenari[0]['nama_kenari']?></label></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
            </div>
            <div class="modal-body mx-auto">
            <?php if($kenari[0]['gambar'] != null){?>
							<img src="<?=base_url('uploads/canary/'.$kenari[0]['gambar'])?>" style="width: 400px;" style="height: 400px;">
						<?php } else {?>
							<img src="<?=base_url('uploads/canary/default.jpg')?>" style="width:200px"><br>
                            <label style="color: chartreuse;">Foto belum diupload..!!</label>
						<?php } ?>
            </div>
            
        <?php
    }

    public function save()
    {
        $this->preferensi_m->save();
        if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
			redirect('penilaian/preferensi');
		} else {
            $this->session->set_flashdata('gagal', 'Data gagal disimpan');
			redirect('penilaian/preferensi');
        }
    }

    public function cnorm()
    {
        $this->load->dbforge();
        $this->dbforge->drop_table('normalisasi',TRUE);
        $this->penilaian_m->norm();
    }
}

