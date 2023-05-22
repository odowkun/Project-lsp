<?php
   class Controller_Admin extends CI_Controller {      
      public function __construct() {
         parent::__construct();
         $this->load->model('Model_Validasi');
         $this->Model_Validasi->validasi();
         $this->load->model("Model_Admin");
      }
      
      function card() {
         $data['card']=$this->load->view('template/dashboard/admin/card', '', TRUE);
         $this->load->view('template/dashboard/admin/index', $data);
      }

      function tableSkema() {
			$hasiltable['hasil']=$this->Model_Admin->tableskema();
			$data['table']=$this->load->view('template/dashboard/admin/skema_table',$hasiltable,TRUE);
         $this->load->view('template/dashboard/admin/index', $data);	
		}
      
      function tableAsesi() {
         $hasiltable['hasil']=$this->Model_Admin->tableasesi();
         $data['table']=$this->load->view('template/dashboard/admin/asesi_table',$hasiltable,TRUE);
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
         $this->Model_Admin->updateSkema($kodeSkema);
      }

      function simpanPegawai() {
         $this->Model_Admin->simpanPegawai();
         redirect('Controller_Admin/formPegawai');
      }
   }
?>