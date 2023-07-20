<?php
   class Controller_Asesi extends CI_Controller {      
      public function __construct() {
         parent::__construct();
         $this->load->model('Model_Validasi');
         $this->Model_Validasi->validasi();
         $this->load->model("Model_Asesi");
         $this->load->model("Model_Skema");
      }


      function home() {
         $nim = $this->session->userdata('Username');
         $data['dataDiri'] = $this->Model_Asesi->getData($nim);
         $data['home']=$this->load->view('template/dashboard/asesi/home', $data, TRUE);
         $this->load->view('template/dashboard/asesi/index', $data);
      }

      function editData() {
         $nim = $this->session->userdata('Username');
         $data['dataDiri'] = $this->Model_Asesi->getData($nim);
         $data['editData']=$this->load->view('template/dashboard/asesi/editData', $data, TRUE);
         $this->load->view('template/dashboard/asesi/index', $data);
      }

      function submitData() {
         $nim = $this->session->userdata('Username');
         $this->Model_Asesi->submitData($nim);
      }

      function informasi(){
         $data['tbSkema'] = $this->Model_Asesi->skema();
         $data['informasi']=$this->load->view('template/dashboard/asesi/informasi', $data, TRUE);
         $this->load->view('template/dashboard/asesi/index', $data);
      }

		function detailSkema(){
			$dataIdJurusan = $this->input->get('datajurusan');
			$dataKodeSkema = $this->input->get('dataskema');
			$data['hasil'] = $this->Model_Skema->informasiSkema($dataIdJurusan, $dataKodeSkema);
			$data['tbSkema'] = $this->Model_Skema->skema($dataIdJurusan);
         $data['informasi']=$this->load->view('template/dashboard/asesi/detailSkema', $data, TRUE);
         $this->load->view('template/dashboard/asesi/index', $data);
		}

      function daftar(){
         $nim = $this->session->userdata('Username');
         $data['dataSkema'] = $this->Model_Asesi->pilihSkema();
         $data['hasil'] = $this->Model_Asesi->cekPendaftaran($nim);
         $data['daftar']=$this->load->view('template/dashboard/asesi/daftarSkema', $data, TRUE);
         $this->load->view('template/dashboard/asesi/index', $data);
      }

      function submitdaftar(){
         $nim = $this->session->userdata('Username');
         $this->Model_Asesi->submitDaftar($nim);
      }
   }
?>