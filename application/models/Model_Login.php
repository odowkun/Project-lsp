<?php
	class Model_Login extends CI_Model
	{
		
		function proseslogin()
		{
			$Username=$this->input->post('username');
			$Password=$this->input->post('password');
			
			$sql="select * from tblogin where Username='".$Username."' ";
			$sql.="and Password='".$Password."'";
			$query=$this->db->query($sql);	
			if ($query->num_rows()>0)
			{
				//ada data	
				$data=$query->row();
				$Username=$data->username;
				$level=$data->level;

				$session=array(
					'Username'=>$Username,
					'level'=>$level
				);
				$this->session->set_userdata($session);
				
                if($level == "0") {
                    redirect('controller_admin/home');
                }else if($level == "1"){
                    redirect('Controller_Dashboard/pegawai');  
                }else if($level == "2"){
                    redirect('Controller_asesi/home');  
                }
			}
			else
			{
				redirect('Controller_Pendaftaran/pendaftaran');
				
			}
		}
		
	}
?>