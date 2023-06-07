<?php
    class Controller_Pegawai extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->model('Model_Validasi');
            $this->Model_Validasi->validasi();
            $this->load->model('model_pegawai');
        }

        function formdaftarskema(){
            $datajurusan['hasil']=$this->model_pegawai->datajurusan();
            $data['konten']=$this->load->view('template/dashboard/pegawai/formskema',$datajurusan,TRUE);
            $dataskema['hasil']=$this->model_pegawai->tampilskema();
            $data['table']=$this->load->view('template/dashboard/pegawai/tableskema',$dataskema,TRUE);
            $this->load->view('template/dashboard/pegawai/dashboardpegawai',$data);
        }

        function formdaftarunit($kodeSkema){
            $kode['kode']=$kodeSkema;
            $data['konten']=$this->load->view('template/dashboard/pegawai/formunit',$kode,TRUE);
            $dataunit['hasil']=$this->model_pegawai->tampilunit($kodeSkema);
            $data['table']=$this->load->view('template/dashboard/pegawai/tableunit',$dataunit,TRUE);
            $this->load->view('template/dashboard/pegawai/dashboardpegawai',$data);
        }
        
        function formdaftarjadwal(){
            $dataskema['hasil']=$this->model_pegawai->dataskema();
            $data['konten']=$this->load->view('template/dashboard/pegawai/formjadwal',$dataskema,TRUE);
            $datajadwal['hasil']=$this->model_pegawai->tampiljadwal();
            $data['table']=$this->load->view('template/dashboard/pegawai/tablejadwal',$datajadwal,TRUE);
            $this->load->view('template/dashboard/pegawai/dashboardpegawai',$data);
        }

        function simpanskema(){
            $this->model_pegawai->simpanskema();
			redirect('controller_pegawai/formdaftarskema');
        }

        function simpanunit(){
            $this->model_pegawai->simpanunit();
        }

        function simpanjadwal(){
            $this->model_pegawai->simpanjadwal();
			redirect('controller_pegawai/formdaftarjadwal');
        }

        function hapusskema($kodeSkema){
			$this->model_pegawai->hapusskema($kodeSkema);
			redirect('controller_pegawai/formdaftarskema');
		}

        function hapusjadwal($idjadwal){
			$this->model_pegawai->hapusjadwal($idjadwal);
			redirect('controller_pegawai/formdaftarjadwal');
		}
		
		function editskema($kodeSkema){
			$this->model_pegawai->editskema($kodeSkema);
		}
		
		function editunit($kodeUnit){
			$this->model_pegawai->editunit($kodeUnit);
		}
		
		function editjadwal($idjadwal){
			$this->model_pegawai->editjadwal($idjadwal);
		}

    }
?>