<?php
	class Model_Regis extends CI_Model
	{
		function password()
		{
			$kata="ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
			$password=substr(str_shuffle($kata),0,4);
			return $password;
		}


		function cekasesi($nim)
		{
			$nim=$this->input->post('nim');
			
			// cek apakah nim terdaftar di master data
			$sql="select * from masterdata where nim='".$nim."' ";
			$query=$this->db->query($sql);	
			if ($query->num_rows()>0)
			{
				$sql="select * from tblogin where username='".$nim."' ";
				$querylogin=$this->db->query($sql);
				if($querylogin->num_rows()>0){
					// jika ada data maka tidak diperbolehkan
					return "terdaftar";
				}

				$data=$query->row();
				$smester=$data->smester;
				if($smester == 7 || $smester == 8){
					return "true";
				}else {
					return "smestertidakvalid";
				}
				//cek apakah data sudah terdaftar atau belum
			}
			else
			{
				return "false";
			}

		}

		function prosesregis($nim, $email)
		{
			$Username=$this->input->post('nim');
			$Email=$this->input->post('email');
			$Password =$this->password();

			$sql="select * from masterdata where nim='".$Username."' ";
			$query=$this->db->query($sql);
			
			// ambil semua data master dan insert kedalam tbasesi
			$data=$query->row();
			$data->nim;
			$data->namaAsesi;
			$data->jurusan;
			$data->prodi;
			$data->smester;
			$data->email=$Email;
			$this->db->insert('tbasesi',$data);

			// masuk ke tblogin
			$datalogin['username']=$Username;
			$datalogin['password']=$Password;
			$datalogin['level']=2;
			$this->db->insert('tblogin',$datalogin);

			$account = $Password;
			
			return $account;
		}
	}
?>