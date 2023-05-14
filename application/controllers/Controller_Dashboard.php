<?php
//Controll untuk menampilkan tampilan informasi Profile web
class Controller_Dashboard extends CI_Controller
{
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Model_Validasi');
            $this->Model_Validasi->validasi();
        }

        function admin()
        {
            $this->load->view('template/dashboard/admin/index');	
        }	
        function pegawai()
        {
            $this->load->view('template/dashboard/pegawai/dashboardpegawai');	
        }	
        function asesi()
        {
            $this->load->view('template/dashboard/asesi/daftarSkema');	
        }
    }
?>