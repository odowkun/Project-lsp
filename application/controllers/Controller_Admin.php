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
      function detail($kodeSkema) {
         $tabel['unit'] = $this->Model_Admin->tableWhere("tbUnit", array("kodeSkema"=>$kodeSkema));
         $tabel['skema'] = $this->Model_Admin->tableWhere("tbSkema", array("kodeSkema"=>$kodeSkema));
         $data['table'] = $this->load->view("template/dashboard/admin/detailskema", $tabel, TRUE);
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
         $tabel['skema'] = $this->Model_Admin->tableSkema();
         $tabel['asesi'] = $this->Model_Admin->home();
         $tabel['grafik'] = $this->Model_Admin->grafikChart();
         $data['home']=$this->load->view('template/dashboard/admin/home', $tabel, TRUE);
         $this->load->view('template/dashboard/admin/index', $data);
      }
      
      function updateSkema($kodeSkema, $pilih) {
         $this->Model_Admin->updateSkema($kodeSkema, $pilih);
      }

      function fileSkema($kodeSkema) {
         echo "File Pendukung";
      }
      
      // =============================================== PEGAWAI
      function submitPegawai() {
         $pass = $this->Model_Regis->password();
         $this->Model_Admin->submitPegawai($pass);
         redirect(base_url("controller_admin/pegawai"));
      }

      function editPegawai($nipPegawai) {
         $this->Model_Admin->editPegawai($nipPegawai);
      }
      
      function hapusPegawai($nipPegawai) {
         $this->Model_Admin->hapuspegawai($nipPegawai);
         redirect(base_url("controller_admin/pegawai"));
      }

      // ============================================== ASESI
      function submitAsesi() {
         $pass = $this->Model_Regis->password();
         $this->Model_Admin->submitAsesi();
         $this->asesi();
      }
      function detailAsesi($nim) {
         $tabel['asesi'] = $this->Model_Admin->tableWhere('tbasesi', array('nim'=>$nim));
         $data['table'] = $this->load->view("template/dashboard/admin/detailAsesi", $tabel, TRUE);
         $tabel['skema'] = $this->Model_Admin->detailAsesi($nim);
         $data['table'] .= $this->load->view("template/dashboard/admin/asesiSkema", $tabel, TRUE);
         $this->load->view("template/dashboard/admin/index", $data);
      }
      function dataDiri($nim) {
         $tabel['asesi'] = $this->Model_Admin->tableWhere('tbasesi', array('nim'=>$nim));
         $data['table'] = $this->load->view("template/dashboard/admin/dataDiri", $tabel, TRUE);
         $this->load->view("template/dashboard/admin/index", $data);

      }
      
      function fileAsesi($nim, $id) {
         $tabel['asesi'] = $this->Model_Admin->tableWhere('tbasesi', array('nim'=>$nim));
         $data['table'] = $this->load->view("template/dashboard/admin/detailAsesi", $tabel, TRUE);
         $tabel['file'] = $this->Model_Admin->fileasesi($nim, $id);
         $data['table'] .= $this->load->view("template/dashboard/admin/fileasesi", $tabel, TRUE);
         $this->load->view("template/dashboard/admin/index", $data);

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

      function tes() {
         var_dump( $this->Model_Admin->home());
         // $tabel['asesi'] = $this->Model_Admin->detailAsesi($nim);
         // $this->load->view("template/dashboard/admin/tes", true);
      }
   }
?>