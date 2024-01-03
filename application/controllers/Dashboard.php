<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
    {
        parent:: __construct();
        check_not_login();
        $this->load->model('kenari_m');
        $this->load->model('user_m');
	   
    }
	public function index()
	{
		check_not_login();
		$data['nav'] = "active";
		$data['judul'] = "Agam Canary | Dashboard";
		$data['jluser'] = $this->user_m->countUser(); 
		$data['jlkenari'] = $this->kenari_m->countKenari(); 
		$data['jlkenarird'] = $this->kenari_m->countKenariReady(); 
		$data['jljan'] = $this->kenari_m->countKenariJan(); 
		$data['jlbet'] = $this->kenari_m->countKenariBet(); 
		$data['jlbetrd'] = $this->kenari_m->countKenariBetReady(); 
		$data['jljanrd'] = $this->kenari_m->countKenariJanReady(); 
		$this->template->load('template', 'dashboard', $data);
	}
}
