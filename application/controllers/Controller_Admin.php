<?php
   class Controller_Admin extends CI_Controller {      
      public function __construct() {
         parent::__construct();
         $this->load->model('Model_Validasi');
         $this->Model_Validasi->validasi();
         $this->load->model("Model_Admin");
         $this->load->model("Model_Regis");
      }

      // ================================================ TABEL
      function table($namaTabel) {
			$hasiltable['hasil']=$this->Model_Admin->table($namaTabel);
			$table=$this->load->view('template/dashboard/admin/'.$namaTabel, $hasiltable, TRUE);
         return $table;
		}

      function jurusan() {
         $data['table'] = $this->table("tbjurusan");
         $this->load->view('template/dashboard/admin/index', $data);
      }

      function prodi() {
         $data['table'] = $this->table("tbprodi");
         $this->load->view('template/dashboard/admin/index', $data);
      }
      function skema() {
         $data['table'] = $this->table("tbskema");
         $this->load->view('template/dashboard/admin/index', $data);
      }
      function pegawai() {
         $data['table'] = $this->table("tbpegawai");
         $this->load->view('template/dashboard/admin/index', $data);
      }
      function asesi() {
         $data['table'] = $this->table("tbasesi");
         $this->load->view('template/dashboard/admin/index', $data);
      }

      // =============================================== TABEL
      
      function home() {
         $this->table("tbskema");
         $this->table("tbasesi");
         $data['home']=$this->load->view('template/dashboard/admin/home', '', TRUE);
         $this->load->view('template/dashboard/admin/index', $data);
      }
      
      function updateSkema($kodeSkema) {
         $this->Model_Admin->updateSkema($kodeSkema);
      }
      
      // =============================================== PEGAWAI
      function submitPegawai() {
         $pass = $this->Model_Regis->password();
         $this->Model_Admin->submitPegawai($pass);
         redirect('controller_admin/pegawai');
      }

      function editPegawai($nipPegawai) {
         $this->Model_Admin->editPegawai($nipPegawai);
      }
      
      function hapusPegawai($nipPegawai) {
         $this->Model_Admin->hapuspegawai($nipPegawai);
         redirect("controller_admin/pegawai");
      }

      // ============================================== ASESI
      function editAsesi($nim) {
         $this->Model_Admin->editAsesi($nim);
      }

      // ============================================== JURUSAN
      
      function submitJurusan() {
         $this->Model_Admin->submitJurusan();
         redirect('controller_admin/jurusan');
      }
      
      function hapusJurusan($idJurusan) {
         $this->Model_Admin->hapusJurusan($idJurusan);
         redirect('controller_admin/jurusan');
      }
      
      function editJurusan($idJurusan) {
         $this->Model_Admin->editJurusan($idJurusan);
      }
      
      // ============================================== PRODI
      function submitProdi() {
         $this->Model_Admin->submitProdi();
         redirect('controller_admin/prodi');
      }

      function hapusProdi($idProdi) {
         $this->Model_Admin->hapusProdi($idProdi);
         redirect('controller_admin/prodi');
		}
      
      function editProdi($idProdi) {
         $this->Model_Admin->editProdi($idProdi);
      }

      function tes($idProdi) {
         $this->Model_Admin->tes($idProdi);
      }
   }
?>