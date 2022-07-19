<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct() {
        parent::__construct();
		if($this->session->userdata('loginStatus') != TRUE){
			$url=base_url('login');
			redirect($url);
		}
    }
    
	public function index(){
		$data = array(
			"title" => "Data Users",
			"user" => $this->db->get('user')->result()
		);
		$this->load->view('layout/header-admin',$data);
		$this->load->view('admin/user/index',$data);
		$this->load->view('layout/footer-admin',$data);
	}

	public function tambah(){
		$data = array(
			"title" => "Tambah Data Users"
		);
		$this->load->view('layout/header-admin',$data);
		$this->load->view('admin/user/tambah',$data);
		$this->load->view('layout/footer-admin',$data);
	}

	public function store(){
		$this->form_validation->set_rules("nama", "Nama Lengkap", "required");
		$this->form_validation->set_rules("username", "Username", "required");
		$this->form_validation->set_rules("password", "Password", "required");
		if($this->form_validation->run() != false) {
			$data = [
				'user_nama' => htmlspecialchars($this->input->post("nama", TRUE) ,ENT_QUOTES),
				'user_username' => htmlspecialchars($this->input->post("username", TRUE) ,ENT_QUOTES),
				'user_password' => md5($this->input->post("password")),
			];
			$this->db->insert("user", $data);
			$this->session->set_flashdata("success"," Berhasil Insert Data ! ");
			redirect(base_url("users"));
		}else{
			$this->session->set_flashdata("failed"," Gagal Insert Data ! ".validation_errors());
			redirect(base_url("users/tambah"));
		}
	}

	public function edit(){
		if($this->uri->segment('3') == ''){ 
			echo '<script>alert("halaman tidak ditemukan");window.location="'.base_url('users').'";</script>';
		}
		$user =  $this->db->query("SELECT * FROM user WHERE user.id_user = ? ", array($this->uri->segment('3')))->row();
		if(isset($user)){

		}else{
			$this->session->set_flashdata("failed"," Tidak ditemukan data ID dari Users ! ");
			redirect(base_url('users'));
		}

		$data = array(
			"title" => "Edit Data Users",
			"user" => $user
		);

		$this->load->view('layout/header-admin',$data);
		$this->load->view('admin/user/edit',$data);
		$this->load->view('layout/footer-admin',$data);
	}

	public function update(){
		$this->form_validation->set_rules("nama", "Nama Lengkap", "required");
		$this->form_validation->set_rules("username", "Username", "required");

		if($this->form_validation->run() != false) {

			if ($this->input->post("password") == "") {
				$data = [
					'user_nama' => htmlspecialchars($this->input->post("nama", TRUE) ,ENT_QUOTES),
					'user_username' => htmlspecialchars($this->input->post("username", TRUE) ,ENT_QUOTES)
				];
			}else{
				$data = [
					'user_nama' => htmlspecialchars($this->input->post("nama", TRUE) ,ENT_QUOTES),
					'user_username' => htmlspecialchars($this->input->post("username", TRUE) ,ENT_QUOTES),
					'user_password' => md5($this->input->post("password")),
				];
			}

			$this->db->where("id_user", $this->input->post("id")); // ubah id dan postnya
			$this->db->update("user", $data);
			$this->session->set_flashdata("success"," Berhasil Update Data ! ");
			redirect(base_url("users"));
		}else{
			$this->session->set_flashdata("failed"," Gagal Update Data ! ".validation_errors());
			redirect(base_url("users/edit/".$this->input->post("id")));
		}
	}

	public function delete(){
		if($this->uri->segment('3') == ''){ 
			echo '<script>alert("halaman tidak ditemukan");window.location="'.base_url('users').'";</script>';
		}
		$id = $this->uri->segment('3');
		$cek = $this->db->get_where("user",["id_user" => $id]); // tulis id yang dituju
		if($cek->num_rows() > 0){
			$this->db->where("id_user",$id); // tulis id yang dituju
			$this->db->delete("user");
			$this->session->set_flashdata("success"," Berhasil Delete Data ! ");
			redirect(base_url("users"));
		}else{
			$this->session->set_flashdata("failed"," Gagal Delete Data ! ".validation_errors());
			redirect(base_url("users"));
		}
	}

	public function profil(){
		$user =  $this->db->query("SELECT * FROM user WHERE user.id_user = ? ", array($this->session->userdata('id')))->row();

		$data = array(
			"title" => "Setting Profile",
			"user" => $user
		);

		$this->load->view('layout/header-admin',$data);
		$this->load->view('admin/user/profile',$data);
		$this->load->view('layout/footer-admin',$data);
	}

	public function profileupdt(){
		$this->form_validation->set_rules("nama", "Nama Lengkap", "required");
		$this->form_validation->set_rules("username", "Username", "required");

		if($this->form_validation->run() != false) {

			if ($this->input->post("password") == "") {
				$data = [
					'user_nama' => htmlspecialchars($this->input->post("nama", TRUE) ,ENT_QUOTES),
					'user_username' => htmlspecialchars($this->input->post("username", TRUE) ,ENT_QUOTES)
				];
			}else{
				$data = [
					'user_nama' => htmlspecialchars($this->input->post("nama", TRUE) ,ENT_QUOTES),
					'user_username' => htmlspecialchars($this->input->post("username", TRUE) ,ENT_QUOTES),
					'user_password' => md5($this->input->post("password")),
				];
			}

			$this->db->where("id_user", $this->input->post("id")); // ubah id dan postnya
			$this->db->update("user", $data);
			$this->session->set_flashdata("success"," Berhasil Update Data ! ");
			redirect(base_url("users/profil"));
		}else{
			$this->session->set_flashdata("failed"," Gagal Update Data ! ".validation_errors());
			redirect(base_url("users/profil/".$this->input->post("id")));
		}
	}

}
