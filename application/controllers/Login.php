<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->data['CI'] =& get_instance();
        $this->load->helper(array('form', 'url'));
        $this->load->model('M_login');
 
	}

	public function index(){
		if($this->session->userdata('loginStatus') == TRUE){
            $url=base_url('dashboard');
            redirect($url);
        }
		$this->load->view('login');
	}

	function loginAct(){
		$user = htmlspecialchars($this->input->post('user',TRUE),ENT_QUOTES);
    	$pass = htmlspecialchars($this->input->post('pass',TRUE),ENT_QUOTES);
		
		$cek = $this->db->query("SELECT * FROM user WHERE user_username = ? AND user_password=?", array($user, md5($pass)));
		$row = $cek->num_rows();
		if($row > 0){
 			$arrUser = $cek->row_array();
			$this->session->set_userdata('loginStatus',TRUE);
            $this->session->set_userdata('id',$arrUser['id_user']);
            $this->session->set_userdata('nama',$arrUser['user_nama']);
            $this->session->set_flashdata('success','<strong>Hai '.$arrUser['user_nama'].'!</strong> Selamat datang Kembali ..');
            redirect(base_url('dashboard'));
		}else{
			 $this->session->set_flashdata('failed','<strong>Login Gagal,</strong> Periksa Kembali Username/Password Anda !');
            redirect(base_url('login'));
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
