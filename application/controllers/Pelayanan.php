<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelayanan extends CI_Controller {

	public function __construct() {
        parent::__construct();
		if($this->session->userdata('loginStatus') != TRUE){
			$url=base_url('login');
			redirect($url);
		}
    }
    
	public function index(){
		$data = array(
			"title" => "Data Pelayanan",
			"layanan" => $this->db->get('layanan')->result()
		);
		$this->load->view('layout/header-admin',$data);
		$this->load->view('admin/layanan/index',$data);
		$this->load->view('layout/footer-admin',$data);
	}

	public function tambah(){
		$data = array(
			"title" => "Tambah Data Pelayanan"
		);
		$this->load->view('layout/header-admin',$data);
		$this->load->view('admin/layanan/tambah',$data);
		$this->load->view('layout/footer-admin',$data);
	}
 
	public function store(){
		$this->form_validation->set_rules("layanan", "Nama Pelayanan", "required");
		if($this->form_validation->run() != false) {
			$data = [
				'layanan_nama' => htmlspecialchars($this->input->post("layanan", TRUE) ,ENT_QUOTES),
			];
			$this->db->insert("layanan", $data);
			$this->session->set_flashdata("success"," Berhasil Insert Data ! ");
			redirect(base_url("pelayanan"));
		}else{
			$this->session->set_flashdata("failed"," Gagal Insert Data ! ".validation_errors());
			redirect(base_url("pelayanan/tambah"));
		}
	}

	public function edit(){
		if($this->uri->segment('3') == ''){ 
			echo '<script>alert("halaman tidak ditemukan");window.location="'.base_url('pelayanan').'";</script>';
		}
			$layanan =  $this->db->query("SELECT * FROM layanan WHERE layanan.id_layanan = ? ", array($this->uri->segment('3')))->row();
			if(isset($layanan)){

			}else{
				$this->session->set_flashdata("failed"," Tidak ditemukan data ID dari Users ! ");
				redirect(base_url('pelayanan'));
			}

			$data = array(
				"title" => "Edit Data Pelayanan",
				"layanan" => $layanan
			);

			$this->load->view('layout/header-admin',$data);
			$this->load->view('admin/layanan/edit',$data);
			$this->load->view('layout/footer-admin',$data);
	}

	public function update(){
		$this->form_validation->set_rules("layanan", "Nama Pelayanan", "required");

		if($this->form_validation->run() != false) {
			$data = [
				'layanan_nama' => htmlspecialchars($this->input->post("layanan", TRUE) ,ENT_QUOTES),
			];

			$this->db->where("id_layanan", $this->input->post("id")); // ubah id dan postnya
			$this->db->update("layanan", $data);
			$this->session->set_flashdata("success"," Berhasil Update Data ! ");
			redirect(base_url("pelayanan"));
		}else{
			$this->session->set_flashdata("failed"," Gagal Update Data ! ".validation_errors());
			redirect(base_url("pelayanan/edit/".$this->input->post("id")));
		}
	}

	public function delete(){
		if($this->uri->segment('3') == ''){ 
			echo '<script>alert("halaman tidak ditemukan");window.location="'.base_url('pelayanan').'";</script>';
		}
		$id = $this->uri->segment('3');
		$cek = $this->db->get_where("layanan",["id_layanan" => $id]); // tulis id yang dituju
		if($cek->num_rows() > 0){
			$this->db->where("id_layanan",$id); // tulis id yang dituju
			$this->db->delete("layanan");
			$this->session->set_flashdata("success"," Berhasil Delete Data ! ");
			redirect(base_url("pelayanan"));
		}else{
			$this->session->set_flashdata("failed"," Gagal Delete Data ! ".validation_errors());
			redirect(base_url("pelayanan"));
		}
	}
}
