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
            $data['home']=$this->load->view('template/dashboard/admin/home', '', TRUE);
            $this->load->view('template/dashboard/admin/index', $data);	
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