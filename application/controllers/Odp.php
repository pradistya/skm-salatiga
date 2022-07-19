<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Odp extends CI_Controller {

	public function __construct() {
        parent::__construct();
		if($this->session->userdata('loginStatus') != TRUE){
			$url=base_url('login');
			redirect($url);
		}
    }
    
	public function index(){

		$data = array(
			"title" => "Data OPD",
			"odp" => $this->db->get('opd')->result()
		);
		$this->load->view('layout/header-admin',$data);
		$this->load->view('admin/odp/index',$data);
		$this->load->view('layout/footer-admin',$data);
	}

	public function tambah(){
		$data = array(
			"title" => "Tambah Data OPD"
		);
		$this->load->view('layout/header-admin',$data);
		$this->load->view('admin/odp/tambah',$data);
		$this->load->view('layout/footer-admin',$data);
	}
 
	public function store(){
		$this->form_validation->set_rules("odp", "Nama OPD", "required");
		if($this->form_validation->run() != false) {
			$data = [
				'opd_nama' => htmlspecialchars($this->input->post("odp", TRUE) ,ENT_QUOTES),
			];
			$this->db->insert("opd", $data);
			$this->session->set_flashdata("success"," Berhasil Insert Data ! ");
			redirect(base_url("odp"));
		}else{
			$this->session->set_flashdata("failed"," Gagal Insert Data ! ".validation_errors());
			redirect(base_url("odp/tambah"));
		}
	}

	public function edit(){
		if($this->uri->segment('3') == ''){ 
			echo '<script>alert("halaman tidak ditemukan");window.location="'.base_url('odp').'";</script>';}
			$odp =  $this->db->query("SELECT * FROM opd WHERE opd.id_opd = ? ", array($this->uri->segment('3')))->row();
			if(isset($odp)){

			}else{
				$this->session->set_flashdata("failed"," Tidak ditemukan data ID dari Users ! ");
				redirect(base_url('odp'));
			}

			$data = array(
				"title" => "Edit Data OPD",
				"odp" => $odp
			);

			$this->load->view('layout/header-admin',$data);
			$this->load->view('admin/odp/edit',$data);
			$this->load->view('layout/footer-admin',$data);
		}

		public function update(){
			$this->form_validation->set_rules("odp", "Nama OPD", "required");

			if($this->form_validation->run() != false) {
				$data = [
					'opd_nama' => htmlspecialchars($this->input->post("odp", TRUE) ,ENT_QUOTES),
				];

				$this->db->where("id_opd", $this->input->post("id")); // ubah id dan postnya
				$this->db->update("opd", $data);
				$this->session->set_flashdata("success"," Berhasil Update Data ! ");
				redirect(base_url("odp"));
			}else{
				$this->session->set_flashdata("failed"," Gagal Update Data ! ".validation_errors());
				redirect(base_url("odp/edit/".$this->input->post("id")));
			}
		}

		public function delete(){
			if($this->uri->segment('3') == ''){ 
				echo '<script>alert("halaman tidak ditemukan");window.location="'.base_url('odp').'";</script>';
			}
			$id = $this->uri->segment('3');
			$cek = $this->db->get_where("opd",["id_opd" => $id]); // tulis id yang dituju
			if($cek->num_rows() > 0){
				$this->db->where("id_opd",$id); // tulis id yang dituju
				$this->db->delete("opd");
				$this->session->set_flashdata("success"," Berhasil Delete Data ! ");
				redirect(base_url("odp"));
			}else{
				$this->session->set_flashdata("failed"," Gagal Delete Data ! ".validation_errors());
				redirect(base_url("odp"));
			}
		}

	}
