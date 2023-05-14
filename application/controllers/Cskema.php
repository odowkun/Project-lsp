<?php
    class Cskema extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->model('mskema');
        }

        function formdaftarskema(){
            $data['konten']=$this->load->view('template/dashboard/pegawai/pendaftaranskema','',TRUE);
            $dataskema['hasil']=$this->mskema->tampilskema();
            $data['table']=$this->load->view('template/dashboard/pegawai/tableskema',$dataskema,TRUE);
            $this->load->view('template/dashboard/pegawai/dashboardpegawai',$data);
        }

        function simpanskema(){
            $this->mskema->simpanskema();
			redirect('cskema/formdaftarskema');
        }

        function hapusskema($kodeSkema){
			$this->mskema->hapusskema($kodeSkema);
			redirect('cskema/formdaftarskema');
		}
		
		function editskema($kodeSkema){
			$this->mskema->editskema($kodeSkema);
		}

    }
?>