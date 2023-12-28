<?php
   class Controller_Admin extends CI_Controller {      
      public function __construct() {
         parent::__construct();
         $this->load->model('Model_Validasi');
         $this->Model_Validasi->validasi();
         $this->load->model("Model_Admin");
         $this->load->model("Model_Regis");
      }

      // ================================================ SIDEBAR
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

      // =============================================== SKEMA
      function detailSkema($kodeSkema) {
         $tabel['unit'] = $this->Model_Admin->tableWhere("tbUnit", array("kodeSkema"=>$kodeSkema));
         $tabel['skema'] = $this->Model_Admin->tableWhere("tbSkema", array("kodeSkema"=>$kodeSkema));
         $data['table'] = $this->load->view("template/dashboard/admin/skemaDetail", $tabel, TRUE);
         $this->load->view('template/dashboard/admin/index', $data);
      }
      function fileSkema($kodeSkema) {
         echo "File Pendukung";
      }
      function updateSkema($kodeSkema, $pilih) {
         $this->Model_Admin->updateSkema($kodeSkema, $pilih);
      }
      // =============================================== HOME
      function home() {
         $tabel['skema'] = $this->Model_Admin->tableSkema();
         $tabel['asesi'] = $this->Model_Admin->berkas(TRUE);
         $tabel['grafik'] = $this->Model_Admin->grafikChart();
         $data['home']=$this->load->view('template/dashboard/admin/home', $tabel, TRUE);
         $this->load->view('template/dashboard/admin/index', $data);
      }  
      // =============================================== PEGAWAI
      function submitPegawai() {
         $pass = $this->Model_Regis->password();
         $this->Model_Admin->submitPegawai($pass);
         redirect(base_url("Controller_Admin/pegawai"));
      }

      function editPegawai($nipPegawai) {
         $this->Model_Admin->editPegawai($nipPegawai);
      }
      
      function hapusPegawai($nipPegawai) {
         $this->Model_Admin->hapuspegawai($nipPegawai);
         redirect(base_url("Controller_Admin/pegawai"));
      }

      // ============================================== ASESI
      function detailAsesi($nim) {
         $tabel['asesi'] = $this->Model_Admin->tableWhere('tbasesi', array('nim'=>$nim));
         $data['table'] = $this->load->view("template/dashboard/admin/asesiDetail", $tabel, TRUE);
         $tabel['skema'] = $this->Model_Admin->detailAsesi($nim);
         $data['table'] .= $this->load->view("template/dashboard/admin/asesiSkema", $tabel, TRUE);
         $this->load->view("template/dashboard/admin/index", $data);
      }
      function dataDiri($nim) {
         $tabel['asesi'] = $this->Model_Admin->tableWhere('tbasesi', array('nim'=>$nim));
         $data['table'] = $this->load->view("template/dashboard/admin/asesiDataDiri", $tabel, TRUE);
         $this->load->view("template/dashboard/admin/index", $data);
      }  
      // ============================================== BERKAS
      function berkas() {
         $tabel['asesi'] = $this->Model_Admin->berkas(FALSE);
         $data['table'] = $this->load->view("template/dashboard/admin/berkasAsesi", $tabel, TRUE);
         $this->load->view("template/dashboard/admin/index", $data);
      }
      function detailBerkas($id) {
         $tabel['konten'] = $this->Model_Admin->tableWhere('tbUjian', array('idUjian'=>$id));
         $data['table'] = $this->load->view("template/dashboard/admin/berkasDetail", $tabel, TRUE);
         $this->load->view("template/dashboard/admin/index", $data);
      }

      function submitBerkas($id, $value) {
         $this->Model_Admin->submitBerkas($id, $value);
         redirect(base_url("Controller_Admin/detailberkas/$id"));
      }
      function submitBayar($id, $value) {
         $this->Model_Admin->submitBayar($id, $value);
         redirect(base_url("Controller_Admin/detailberkas/$id"));
      }

      // ============================================== JURUSAN
      
      function submitJurusan() {
         $this->Model_Admin->submitJurusan();
         redirect('Controller_Admin/jurusan');
      }
      
      function hapusJurusan($idJurusan) {
         $this->Model_Admin->hapusJurusan($idJurusan);
         redirect('Controller_Admin/jurusan');
      }
      
      function editJurusan($idJurusan) {
         $this->Model_Admin->editJurusan($idJurusan);
      }
      
      // ============================================== PRODI
      function submitProdi() {
         $this->Model_Admin->submitProdi();
         redirect('Controller_Admin/prodi');
      }

      function hapusProdi($idProdi) {
         $this->Model_Admin->hapusProdi($idProdi);
         redirect('Controller_Admin/prodi');
		}
      
      function editProdi($idProdi) {
         $this->Model_Admin->editProdi($idProdi);
      }

      // =============================================== PASSWORD
      function password() {
         $data['table'] = $this->load->view("template/dashboard/admin/ubahpassword", '',TRUE);
         $this->load->view("template/dashboard/admin/index", $data);
      }

      function ubahPassword() {
         $this->Model_Admin->ubahPassword();
         redirect('Controller_Admin/password');
      }

      function tes() {
         var_dump( $this->Model_Admin->home());
         // $tabel['asesi'] = $this->Model_Admin->detailAsesi($nim);
         // $this->load->view("template/dashboard/admin/tes", true);
      }
   }
?>