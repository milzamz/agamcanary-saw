<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct()
    {
        parent:: __construct();
        check_not_login();
        $this->load->model('kenari_m');	   
        $this->load->model('penilaian_m');	   
        $this->load->model('preferensi_m');	   
    }

    public function index()
    {
        $data['hasil'] = $this->penilaian_m->lap();
        $data['judul'] = "Agam Canary | Riwayat Perhitungan";
        $this->template->load('template', 'laporan/laporan_data', $data);
    }

	public function indexnorm()
	{
		$data['row'] = $this->penilaian_m->get();
        $this->load->view('laporan/normalisasi', $data);
	}

    public function cetaknorm(){
        ob_start();
        $data['row'] = $this->penilaian_m->get();
        $this->load->view('laporan/normalisasi', $data);
        $html = ob_get_contents();
            ob_end_clean();
            
        require './assets/plugins/html2pdf/autoload.php';
        
        $pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
        $pdf->WriteHTML($html);
        $pdf->Output('Data Normalisasi.pdf', 'D');
    }    
    
    public function indexrank()
	{
		$data['pref'] = $this->preferensi_m->get();
        $this->load->view('laporan/perankingan', $data);
	}

    public function cetakrank(){
        ob_start();
        $data['pref'] = $this->preferensi_m->get();
        $this->load->view('laporan/perankingan', $data);
        $html = ob_get_contents();
            ob_end_clean();
            
        require './assets/plugins/html2pdf/autoload.php';
        
        $pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
        $pdf->WriteHTML($html);
        $pdf->Output('Data Perankingan.pdf', 'D');
    }

    public function indexperkenari($kenari_id)
    {
        $data['kenari']=$this->kenari_m->get_detail(array($kenari_id));
        $data['detail']=$this->preferensi_m->get_nilai(array($kenari_id));
        $this->load->view('laporan/cetakperkenari', $data);
    }

    public function cetakperkenari($kenari_id)
    {
        ob_start();
        $data['kenari']=$this->kenari_m->get_detail(array($kenari_id));
        $data['detail']=$this->preferensi_m->get_nilai(array($kenari_id));
        $this->load->view('laporan/cetakperkenari', $data);
        $html = ob_get_contents();
        ob_end_clean();
            
        require './assets/plugins/html2pdf/autoload.php';
        
        $pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
        $pdf->WriteHTML($html);
        $pdf->Output('Detail Kenari.pdf', 'D');
        
    }

    public function clear_data()
    {
        $this->penilaian_m->clear();
        $this->session->set_flashdata('success', 'Data berhasil dibersihkan!!');
        redirect('laporan');
    }
}

