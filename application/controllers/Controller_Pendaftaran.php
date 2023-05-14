<?php
class Controller_Pendaftaran extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Login');
		$this->load->model('Model_Regis');
	}

	function pendaftaran()
	{
		$this->load->view('template/pendaftaran/background');
		$this->load->view('template/pendaftaran/formdaftar');
	}

	function registrasi()
	{
		$this->load->view('template/pendaftaran/background');
		$this->load->view('template/pendaftaran/formregistrasi');
	}

	function proseslogin()
	{
		$this->Model_Login->proseslogin();
	}

	function cekasesi(){
		$nim = array(
			'nim' => $this->input->post('nim')
		);
		$valid = $this->Model_Regis->cekasesi($nim);
		echo $valid;
	}

	function prosesregis()
	{
  		$nim = $this->input->post('nim');
  		$email = $this->input->post('email');
		$value = $this->Model_Regis->prosesregis($nim,$email);
		echo $value;
	}

	function tableskema() {
		$hasiltable['hasil']=$this->Model_Regis->tampiltable();
		$data['table']=$this->load->view('template/dashboard/admin/skema_table',$hasiltable,TRUE);
		$this->load->view('template/dashboard/admin/index', $data);	
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('Controller_LandingPage/tampilawal');	
	}
}
