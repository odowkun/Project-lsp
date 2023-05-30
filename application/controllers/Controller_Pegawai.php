<?php
    class Controller_Pegawai extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->model('model_pegawai');
        }

        function formdaftarskema(){
            $data['konten']=$this->load->view('template/dashboard/pegawai/formskema','',TRUE);
            $dataskema['hasil']=$this->model_pegawai->tampilskema();
            $data['table']=$this->load->view('template/dashboard/pegawai/tableskema',$dataskema,TRUE);
            $this->load->view('template/dashboard/pegawai/dashboardpegawai',$data);
        }

        function formdaftarunit(){
            $data['konten']=$this->load->view('template/dashboard/pegawai/formunit','',TRUE);
            $dataunit['hasil']=$this->model_pegawai->tampilunit();
            $data['table']=$this->load->view('template/dashboard/pegawai/tableunit',$dataunit,TRUE);
            $this->load->view('template/dashboard/pegawai/dashboardpegawai',$data);
        }
        
        function formdaftarjadwal(){
            $data['konten']=$this->load->view('template/dashboard/pegawai/formjadwal','',TRUE);
            $dataunit['hasil']=$this->model_pegawai->tampiljadwal();
            $data['table']=$this->load->view('template/dashboard/pegawai/tablejadwal',$dataunit,TRUE);
            $this->load->view('template/dashboard/pegawai/dashboardpegawai',$data);
        }

        function simpanskema(){
            $this->model_pegawai->simpanskema();
			redirect('controller_pegawai/formdaftarskema');
        }

        function simpanunit(){
            $this->model_pegawai->simpanunit();
			redirect('controller_pegawai/formdaftarunit');
        }

        function simpanjadwal(){
            $this->model_pegawai->simpanjadwal();
			redirect('controller_pegawai/formdaftarjadwal');
        }

        function hapusskema($kodeSkema){
			$this->model_pegawai->hapusskema($kodeSkema);
			redirect('controller_pegawai/formdaftarskema');
		}

        function hapusunit($kodeUnit){
			$this->model_pegawai->hapusunit($kodeUnit);
			redirect('controller_pegawai/formdaftarunit');
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