<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Home extends CI_Controller {

	public function index(){
		$data = array(
			"title" => "Selamat Datang"

		);
		$this->load->view('layout/header-responden', $data);
		$this->load->view('responden/index', $data);
		$this->load->view('layout/footer-responden', $data);
	}

	public function datadiri(){

		if ($this->session->userdata('datadiri') != "") {
			$datadiri = $this->session->userdata('datadiri');
		}else{
			$datadiri = "";
		}

		$data = array(
			"title" => "Formulir Data Diri",
			"odp" => $this->db->get('opd')->result(),
			"datadiri" => $datadiri,
			"layanan" => $this->db->get('layanan')->result()
		);

		$this->load->view('layout/header-responden', $data);
		$this->load->view('responden/datadiri', $data);
		$this->load->view('layout/footer-responden', $data);
	}

	public function storediri(){
		$this->form_validation->set_rules("nama", "Nama Lengkap", "required");
		$this->form_validation->set_rules("jk", "Jenis Kelamin", "required");
		$this->form_validation->set_rules("pekerjaan", "Pekerjaan", "required");
		$this->form_validation->set_rules("pendidikan", "Pendidikan", "required");
		// $this->form_validation->set_rules("alamat", "alamat", "required");
		$this->form_validation->set_rules("nohp", "nohp", "required");
		$this->form_validation->set_rules("opd", "OPD", "required");
		$this->form_validation->set_rules("layanan", "Pelayanan", "required");

		$cek =  $this->db->query("SELECT * FROM peserta WHERE peserta.peserta_hp = ? AND peserta.peserta_opd= ? AND peserta.peserta_layanan = ? ", array($this->input->post('nohp'), $this->input->post('opd'), $this->input->post('layanan')))->row();
		if (isset($cek)) {
			$this->session->set_flashdata("failed","Anda sudah mengisi Survey! <br> Silahkan isi Survey dengan OPD dan Pelayanan yang berbeda");
			redirect(base_url("home"));
		}else{
			if($this->form_validation->run() != false) {

				$data = array(
					'nama' => htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES),
					'jk'	=> htmlspecialchars($this->input->post('jk',TRUE),ENT_QUOTES),
					'pekerjaan'	=> htmlspecialchars($this->input->post('pekerjaan',TRUE),ENT_QUOTES),
					'pendidikan'	=> htmlspecialchars($this->input->post('pendidikan',TRUE),ENT_QUOTES),
					'alamat'	=> htmlspecialchars($this->input->post('alamat',TRUE),ENT_QUOTES),
					'nohp'	=> htmlspecialchars($this->input->post('nohp',TRUE),ENT_QUOTES),
					'opd'	=> htmlspecialchars($this->input->post('opd',TRUE),ENT_QUOTES),
					'layanan'	=> htmlspecialchars($this->input->post('layanan',TRUE),ENT_QUOTES),
					'date'	=> date('Y-m-d H:i:s')
				);
				$this->session->set_userdata('datadiriStatus',TRUE);
				$this->session->set_userdata('datadiri', $data);
				$this->session->set_flashdata("success"," Hallo, ".$this->input->post('nama',TRUE)." Silahkan isi kuisioner dibawah ya!");
				redirect(base_url("home/kuisioner"));
			}else{
				$this->session->set_flashdata("failed"," Gagal Insert Data ! ".validation_errors());
				redirect(base_url("home/datadiri"));
			}
		}
	}

	public function kuisioner(){

		if($this->session->userdata('datadiriStatus') != TRUE){
			$url=base_url('home/datadiri');
			$this->session->set_flashdata("failed"," Anda harus mengisi Data Diri terlebih dahulu!");
			redirect($url);
		}


		$data = array(
			"title" => "Kuisioner",
			"pertanyaan" => $this->db->get('pertanyaan')->result()
		);
		$this->load->view('layout/header-responden', $data);
		$this->load->view('responden/kuisioner', $data);
		$this->load->view('layout/footer-responden', $data);
	}

	public function kuisionerstore(){

		$arrResult = array();
		$quiz = $this->db->get('pertanyaan')->result();
		$idSoal = $this->input->post('id');
		$pilihan = $this->input->post('pilihan');

		for ($i=0; $i < count($this->input->post('id')); $i++) { 
			$index = $idSoal[$i];

			$data = array(
				"idSoal" => $idSoal[$i],
				"pilihan" => $pilihan[$index]
			);

			array_push($arrResult, $data);
		}

		$this->session->set_userdata('kuisionerStatus',TRUE);
		$this->session->set_userdata('kuisioner', $arrResult);
		redirect(base_url("home/kritik"));

		// for ($i=0; $i < count($arrResult); $i++) { 
		// 	echo "ID Soal ".$arrResult[$i]['idSoal']."<br>";
		// 	echo "Pilihannya: ".$arrResult[$i]['pilihan']."<br>"."<br>";
		// }

		// Hasilnya
		// ID Soal 1
		// Pilihannya: Kurang

		// ID Soal 3
		// Pilihannya: Cukup
	}

	public function kritik(){

		if($this->session->userdata('datadiriStatus') != TRUE){
			$url=base_url('home/datadiri');
			$this->session->set_flashdata("failed"," Anda harus mengisi Data Diri terlebih dahulu!");
			redirect($url);
		}elseif($this->session->userdata('kuisionerStatus') != TRUE){
			$url=base_url('home/kuisioner');
			$this->session->set_flashdata("failed"," Anda harus mengisi Survey terlebih dahulu!");
			redirect($url);
		}

		$data = array(
			"title" => "Kritik Dan Saran"
		);
		$this->load->view('layout/header-responden', $data);
		$this->load->view('responden/kritik', $data);
		$this->load->view('layout/footer-responden', $data);
	}

	public function kritikstore(){

		$kritik = $this->input->post('kritik');
		$this->session->set_userdata('kritikStatus',TRUE);
		$this->session->set_userdata('kritik', $kritik);

		$karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
		$code  = substr(str_shuffle($karakter), 0, 5);

		$datadiri = $this->session->userdata('datadiri');


		$dataPeserta = [
			'peserta_layanan' => $datadiri['layanan'],
			'peserta_opd' => $datadiri['opd'],
			'peserta_nama' => $datadiri['nama'],
			'peserta_jk' => $datadiri['jk'],
			'peserta_pekerjaan' => $datadiri['pekerjaan'],
			'peserta_alamat' => $datadiri['alamat'],
			'peserta_hp' => $datadiri['nohp'],
			'peserta_code' => $code,
			'peserta_date' => $datadiri['date']
		];
		$this->db->insert("peserta", $dataPeserta);
		$id = $this->db->insert_id();
		$kuisioner = $this->session->userdata('kuisioner');

		for ($i=0; $i < count($kuisioner); $i++) { 
			$dataQuiz = [
				'result_peserta' => $id,
				'result_pertanyaan' => $kuisioner[$i]['idSoal'],
				'result_jawaban' => $kuisioner[$i]['pilihan'],
				'result_code' => $code
			];
			$this->db->insert("pertanyaan_result", $dataQuiz);
		}

		$dataKritik = [
			'kritik_code' => $code,
			'kritik' => $this->session->userdata('kritik')
		];

		$this->db->insert("kritik", $dataKritik);
		$this->session->set_userdata('datadiri', "");
		$this->session->set_userdata('kuisioner', "");
		$this->session->set_userdata('kritik', "");

		$this->session->set_userdata('pesertaStatus',TRUE);
		redirect(base_url("home/grafik"));
	}

	public function grafik(){

		if($this->session->userdata('datadiriStatus') != TRUE){
			$url=base_url('home/datadiri');
			$this->session->set_flashdata("failed"," Anda harus mengisi Data Diri terlebih dahulu!");
			redirect($url);
		}elseif($this->session->userdata('kuisionerStatus') != TRUE){
			$url=base_url('home/kuisioner');
			$this->session->set_flashdata("failed"," Anda harus mengisi Survey terlebih dahulu!");
			redirect($url);
		}

		$data = array(
			"title" => "Grafik Hasil Survey",
			"pertanyaan" => $this->db->get('pertanyaan')->result()
		);
		$this->load->view('layout/header-responden', $data);
		$this->load->view('responden/grafik', $data);
		$this->load->view('layout/footer-responden', $data);
	}


	public function selesai(){

		if($this->session->userdata('datadiriStatus') != TRUE){
			$url=base_url('home/datadiri');
			$this->session->set_flashdata("failed"," Anda harus mengisi Data Diri terlebih dahulu!");
			redirect($url);
		}elseif($this->session->userdata('kuisionerStatus') != TRUE){
			$url=base_url('home/kuisioner');
			$this->session->set_flashdata("failed"," Anda harus mengisi Survey terlebih dahulu!");
			redirect($url);
		}elseif ($this->session->userdata('pesertaStatus') != TRUE) {
			$url=base_url('home');
			$this->session->set_flashdata("failed"," Anda harus mengisi Survey terlebih dahulu!");
			redirect($url);
		}

		$data = array(
			"title" => "Selesai"
		);

		$this->load->view('layout/header-responden',$data);
		$this->load->view('responden/selesai',$data);
		$this->load->view('layout/footer-responden',$data);
	}
}
