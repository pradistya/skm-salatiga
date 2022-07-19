<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuisioner extends CI_Controller {

	public function __construct() {
        parent::__construct();
		if($this->session->userdata('loginStatus') != TRUE){
			$url=base_url('login');
			redirect($url);
		}
    }
    
	public function index(){
		$data = array(
			"title" => "Data Kuisioner",
			"pertanyaan" => $this->db->get('pertanyaan')->result()
		);
		$this->load->view('layout/header-admin',$data);
		$this->load->view('admin/kuisioner/index',$data);
		$this->load->view('layout/footer-admin',$data);
	}

	public function tambah(){
		$data = array(
			"title" => "Tambah Data Kuisioner"
		);
		$this->load->view('layout/header-admin',$data);
		$this->load->view('admin/kuisioner/tambah',$data);
		$this->load->view('layout/footer-admin',$data);
	}

	public function store(){
		$this->form_validation->set_rules("kuisioner", "Kuisioner", "required");
		if($this->form_validation->run() != false) {
			$data = [
				'pertanyaan' => htmlspecialchars($this->input->post("kuisioner", TRUE) ,ENT_QUOTES),
			];
			$this->db->insert("pertanyaan", $data);
			$this->session->set_flashdata("success"," Berhasil Insert Data ! ");
			redirect(base_url("kuisioner"));
		}else{
			$this->session->set_flashdata("failed"," Gagal Insert Data ! ".validation_errors());
			redirect(base_url("kuisioner/tambah"));
		}
	}

	public function edit(){
		if($this->uri->segment('3') == ''){ 
			echo '<script>alert("halaman tidak ditemukan");window.location="'.base_url('kuisioner').'";</script>';
		}
			$pertanyaan =  $this->db->query("SELECT * FROM pertanyaan WHERE pertanyaan.id_pertanyaan = ? ", array($this->uri->segment('3')))->row();
			if(isset($pertanyaan)){

			}else{
				$this->session->set_flashdata("failed"," Tidak ditemukan data ID dari Users ! ");
				redirect(base_url('pelayanan'));
			}

			$data = array(
				"title" => "Edit Data Kuisioner",
				"pertanyaan" => $pertanyaan
			);

			$this->load->view('layout/header-admin',$data);
			$this->load->view('admin/kuisioner/edit',$data);
			$this->load->view('layout/footer-admin',$data);
	}

	public function update(){
		$this->form_validation->set_rules("kuisioner", "Kuisioner", "required");

		if($this->form_validation->run() != false) {
			$data = [
				'pertanyaan' => htmlspecialchars($this->input->post("kuisioner", TRUE) ,ENT_QUOTES),
			];

			$this->db->where("id_pertanyaan", $this->input->post("id")); // ubah id dan postnya
			$this->db->update("pertanyaan", $data);
			$this->session->set_flashdata("success"," Berhasil Update Data ! ");
			redirect(base_url("kuisioner"));
		}else{
			$this->session->set_flashdata("failed"," Gagal Update Data ! ".validation_errors());
			redirect(base_url("kuisioner/edit/".$this->input->post("id")));
		}
	}

	public function delete(){
		if($this->uri->segment('3') == ''){ 
			echo '<script>alert("halaman tidak ditemukan");window.location="'.base_url('kuisioner').'";</script>';
		}
		$id = $this->uri->segment('3');
		$cek = $this->db->get_where("pertanyaan",["id_pertanyaan" => $id]); // tulis id yang dituju
		if($cek->num_rows() > 0){
			$this->db->where("id_pertanyaan",$id); // tulis id yang dituju
			$this->db->delete("pertanyaan");
			$this->session->set_flashdata("success"," Berhasil Delete Data ! ");
			redirect(base_url("kuisioner"));
		}else{
			$this->session->set_flashdata("failed"," Gagal Delete Data ! ".validation_errors());
			redirect(base_url("kuisioner"));
		}
	}
}
