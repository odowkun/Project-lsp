<?php
//Controll untuk menampilkan tampilan informasi Profile web
	class Controller_LandingPage extends CI_Controller
	{
		function tampilawal()
		{
			$this->load->view('template/landingPage/index');	
		}	
	}
?>