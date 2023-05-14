<?php
   class Controller_Admin extends CI_Controller {
      public function __construct() {
         parent::__construct();
         $this->load->model("Model_Validasi");
         $this->load->model("Model_Regis");
      }

      function tableSkema() {
			$hasiltable['hasil']=$this->Model_Regis->tampiltable();
			$data['table']=$this->load->view('template/dashboard/admin/skema_table',$hasiltable,TRUE);
         $this->load->view('template/dashboard/admin/index', $data);	
		}

      function formPegawai() {
         $data['formPegawai']=$this->load->view('template/dashboard/admin/formPegawai','',TRUE);
         $this->load->view('template/dashboard/admin/index', $data);
      }
      
      function grafik() {
         $data['grafik']=$this->load->view('template/dashboard/admin/grafik','',TRUE);
         $this->load->view('template/dashboard/admin/index', $data);
      }

      function updateSkema($kodeSkema) {
         $this->Model_Regis->updateSkema($kodeSkema);
      }

      function simpanPegawai() {
         $this->Model_Regis->simpanPegawai();
         redirect('Controller_Admin/formPegawai');
      }
   }
?>