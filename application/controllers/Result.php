<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Result extends CI_Controller {

	public function __construct() {
        parent::__construct();
		if($this->session->userdata('loginStatus') != TRUE){
			$url=base_url('login');
			redirect($url);
		}
    }

	public function index(){

		$data = [
			'title' => "Hasil Kuisioner",
			'peserta' => $this->db->query('SELECT opd.opd_nama, layanan.layanan_nama, peserta.* FROM peserta LEFT JOIN opd ON peserta.peserta_layanan=opd.id_opd LEFT JOIN layanan ON peserta.peserta_layanan ORDER BY peserta.id_peserta DESC')->result(),
			"pertanyaan" => $this->db->get('pertanyaan')->result()
		];

		$this->load->view('layout/header-admin', $data);
		$this->load->view('admin/result/index', $data);
		$this->load->view('layout/footer-admin', $data);
	}

	public function detail(){
		if($this->uri->segment('3') == ''){ 
			echo '<script>alert("halaman tidak ditemukan");window.location="'.base_url('result').'";</script>';
		}
 
		$cek = $this->db->query("SELECT peserta_code FROM peserta WHERE id_peserta=?", array($this->uri->segment('3')))->row();

		$peserta =  $this->db->query("SELECT opd.opd_nama, layanan.layanan_nama, peserta.* FROM peserta LEFT JOIN opd ON peserta.peserta_layanan=opd.id_opd LEFT JOIN layanan ON peserta.peserta_layanan WHERE peserta.id_peserta = ? AND peserta.peserta_code=? ", array($this->uri->segment('3'), $cek->peserta_code))->row();

		$pertanyaan = $this->db->query("SELECT * FROM pertanyaan LEFT JOIN pertanyaan_result ON pertanyaan.id_pertanyaan=pertanyaan_result.result_pertanyaan WHERE pertanyaan_result.result_peserta=? AND pertanyaan_result.result_code=?", array($this->uri->segment(3), $cek->peserta_code))->result();

		$kritik =  $this->db->query("SELECT kritik FROM kritik WHERE kritik_code=?", array($cek->peserta_code))->row();

		if(isset($peserta)){

		}else{
			$this->session->set_flashdata("failed"," Tidak ditemukan data ID dari Database! ");
			redirect(base_url('result'));
		}

		$data = array(
			"title" => "Detail Hasil Kuisioner",
			"peserta" => $peserta,
			"pertanyaan" => $pertanyaan,
			"kritik" => $kritik
		);

		$this->load->view('layout/header-admin',$data);
		$this->load->view('admin/result/detail',$data);
		$this->load->view('layout/footer-admin',$data);
	}

}
