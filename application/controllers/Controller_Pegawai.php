<?php
    class Controller_Pegawai extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->model('model_validasi');
            $this->model_validasi->validasi();
            $this->load->model('model_pegawai');
        }

        //============================== MENU ==============================
        function skema(){
            $datajurusan['hasil']=$this->model_pegawai->datajurusan();
            $data['konten']=$this->load->view('template/dashboard/pegawai/skema',$datajurusan,TRUE);
            $dataskema['hasil']=$this->model_pegawai->tampilskema();
            $data['table']=$this->load->view('template/dashboard/pegawai/tableskema',$dataskema,TRUE);
            $this->load->view('template/dashboard/pegawai/index',$data);
        }

        function unit($kodeSkema){
            $kode['kode']=$kodeSkema;
            $data['konten']=$this->load->view('template/dashboard/pegawai/unit',$kode,TRUE);
            $dataunit['hasil']=$this->model_pegawai->tampilunit($kodeSkema);
            $data['table']=$this->load->view('template/dashboard/pegawai/tableunit',$dataunit,TRUE);
            $this->load->view('template/dashboard/pegawai/index',$data);
        }
        
        function jadwal(){
            $dataskema['hasil']=$this->model_pegawai->dataskema();
            $data['konten']=$this->load->view('template/dashboard/pegawai/jadwal',$dataskema,TRUE);
            $datajadwal['hasil']=$this->model_pegawai->tampiljadwal();
            $data['table']=$this->load->view('template/dashboard/pegawai/tablejadwal',$datajadwal,TRUE);
            $this->load->view('template/dashboard/pegawai/index',$data);
        }

        function verifikasi(){
            $datapendaftar['hasil']=$this->model_pegawai->tampilpendaftar();
            $data['table']=$this->load->view('template/dashboard/pegawai/tablependaftarsertifikasi',$datapendaftar,TRUE);
            $this->load->view('template/dashboard/pegawai/index',$data);
        }
        //==================================================================

        //============================== SKEMA ==============================
        

        function simpanskema(){
            $this->model_pegawai->simpanskema();
			redirect('controller_pegawai/skema');
        }

        function hapusskema($kodeSkema){
			$this->model_pegawai->hapusskema($kodeSkema);
			redirect('controller_pegawai/skema');
		}
		
		function editskema($kodeSkema){
			$this->model_pegawai->editskema($kodeSkema);
		}
        //===================================================================

        //============================== UNIT ==============================
        function simpanunit(){
            $this->model_pegawai->simpanunit();
        }

        function hapusunit($kodeUnit){
			$this->model_pegawai->hapusunit($kodeUnit);
		}
		
		function editunit($kodeUnit){
			$this->model_pegawai->editunit($kodeUnit);
		}
        //==================================================================

        //============================== JADWAL ==============================
        function simpanjadwal(){
            $this->model_pegawai->simpanjadwal();
			redirect('controller_pegawai/jadwal');
        }

        function hapusjadwal($idjadwal){
			$this->model_pegawai->hapusjadwal($idjadwal);
			redirect('controller_pegawai/jadwal');
		}
		
		function editjadwal($idjadwal){
			$this->model_pegawai->editjadwal($idjadwal);
		}
        //====================================================================

        //============================== VERIFIKASI ASESI ==============================
        function datadiri($nim){
            $datadiri['hasil']=$this->model_pegawai->datadiri($nim);
            $data['konten']=$this->load->view('template/dashboard/pegawai/datadiri',$datadiri,TRUE);
            $datapendaftar['hasil']=$this->model_pegawai->tampilpendaftar();
            $data['table']=$this->load->view('template/dashboard/pegawai/tablependaftarsertifikasi',$datapendaftar,TRUE);
            $this->load->view('template/dashboard/pegawai/index',$data);
        }

        function datasertifikasi($idUjian){
            $datasertifikasi['hasil']=$this->model_pegawai->datasertifikasi($idUjian);
            $data['konten']=$this->load->view('template/dashboard/pegawai/datasertifikasi',$datasertifikasi,TRUE);
            $datapendaftar['hasil']=$this->model_pegawai->tampilpendaftar();
            $data['table']=$this->load->view('template/dashboard/pegawai/tablependaftarsertifikasi',$datapendaftar,TRUE);
            $this->load->view('template/dashboard/pegawai/index',$data);
        }

        function buktikelengkapan($idUjian){
            $datakelengkapan['hasil']=$this->model_pegawai->datakelengkapan($idUjian);
            $data['konten']=$this->load->view('template/dashboard/pegawai/buktikelengkapan',$datakelengkapan,TRUE);
            $datapendaftar['hasil']=$this->model_pegawai->tampilpendaftar();
            $data['table']=$this->load->view('template/dashboard/pegawai/tablependaftarsertifikasi',$datapendaftar,TRUE);
            $this->load->view('template/dashboard/pegawai/index',$data);
        }

        function verifikasiKelengkapan($idUjian){
            $this->model_pegawai->verifikasiKelengkapan($idUjian);
        }

        function verifikasiBayar($idUjian){
            $this->model_pegawai->verifikasiBayar($idUjian);
            redirect('controller_pegawai/verifikasi');
        }
        //==============================================================================

    }
?>