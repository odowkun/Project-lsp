<?php
	class Model_Validasi extends CI_Model
	{
		function validasi()
		{
			if ($this->session->userdata('Username')=='')
			{
				echo "<script>alert ('You doesnt have acces for this page, please login first!');</script>";
				redirect('Controller_Pendaftaran/pendaftaran','refresh');
			}
			
		}

		
	}
?>