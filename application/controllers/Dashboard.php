<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
        parent::__construct();
		if($this->session->userdata('loginStatus') != TRUE){
			$url=base_url('login');
			redirect($url);
		}
    }

	public function index(){

		$data = array(
			"title" => "Dashboard",
			"responden" => $this->db->get('peserta')->num_rows(),
			"odp" => $this->db->get('opd')->num_rows(),
			"pertanyaan" => $this->db->get('pertanyaan')->num_rows(),

		);

		$this->load->view('layout/header-admin', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('layout/footer-admin', $data);
	}
}
