<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct() {
        parent::__construct();
		if($this->session->userdata('loginStatus') != TRUE){
			$url=base_url('login');
			redirect($url);
		}
    }

	public function index(){

		$peserta =  $this->db->query("SELECT opd.opd_nama, layanan.layanan_nama, peserta.* FROM peserta LEFT JOIN opd ON peserta.peserta_layanan=opd.id_opd LEFT JOIN layanan ON peserta.peserta_layanan")->result();

		// $pertanyaan = $this->db->query("SELECT * FROM pertanyaan LEFT JOIN pertanyaan_result ON pertanyaan.id_pertanyaan=pertanyaan_result.result_pertanyaan WHERE pertanyaan_result.result_peserta=? AND pertanyaan_result.result_code=?")->result();

		$kritik =  $this->db->query("SELECT kritik FROM kritik")->result();

		if(isset($peserta)){

		}else{
			$this->session->set_flashdata("failed"," Tidak ditemukan data ID dari Database! ");
			redirect(base_url('result'));
		}

		$data = array(
			"title" => "Cetak",
			"peserta" => $peserta
		);

		$this->load->view('laporan', $data);
	}
}
