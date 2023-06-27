<?php
   class Controller_Asesi extends CI_Controller {      
      public function __construct() {
         parent::__construct();
         $this->load->model('Model_Validasi');
         $this->Model_Validasi->validasi();
         $this->load->model("Model_Admin");
      }

      // ================================================ TABEL
      function table($namaTabel) {
			$hasiltable['hasil']=$this->Model_Admin->table($namaTabel);
         return $table;
		}

      function dataAsesi() {
         $data['table'] = $this->table("tbasesi");
         $this->load->view('template/dashboard/asesi/index', $data);
      }

      // =============================================== TABEL
      
      function home($nim) {
        $tabel['dataAsesi'] = $this->Model_Admin->tableWhere("tbasesi", array('nim'=>$nim));
        $data['home']=$this->load->view('template/dashboard/asesi/home', $tabel, TRUE);
        $this->load->view('template/dashboard/asesi/index', $data);	
      }
      
      function updateSkema($kodeSkema, $pilih) {
         $this->Model_Admin->updateSkema($kodeSkema, $pilih);
      }

      function fileSkema($kodeSkema) {
         echo "File Pendukung";
      }
}