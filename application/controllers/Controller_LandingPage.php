<?php
//Controll untuk menampilkan tampilan informasi Profile web
	class Controller_LandingPage extends CI_Controller
	{
		public function __construct() {
			parent::__construct();
			$this->load->model("Model_Skema");
		}

		function tampilawal()
		{	
			$data['jumlahVerifikasi'] = $this->Model_Skema->jumlahSkema();
			$this->load->view('template/landingPage/index', $data);	
		}
		
		function skema(){
			$dataIdJurusan = $this->input->get('data');
			$data['tbSkema'] = $this->Model_Skema->skema($dataIdJurusan);
			$this->load->view('template/landingPage/pilihSkema', $data);
		}

		function detailSkema(){
			$dataIdJurusan = $this->input->get('datajurusan');
			$dataKodeSkema = $this->input->get('dataskema');
			$data['hasil'] = $this->Model_Skema->informasiSkema($dataIdJurusan, $dataKodeSkema);
			$data['tbSkema'] = $this->Model_Skema->skema($dataIdJurusan);
			$this->load->view('template/landingPage/detailSkema', $data);
		}
	}
?>