<?php
	class Model_Admin extends CI_Model
	{
		function password() {
			$kata="ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
			$password=substr(str_shuffle($kata),0,4);
			return $password;
		}
   
   	function table($namaTabel)	{
			$sql="select * from ". $namaTabel;
			$query=$this->db->query($sql);
			if ($query->num_rows() > 0) {
				foreach($query->result() as $data) {
					$hasil[]=$data;	
				}
			} else {
				$hasil="";
			}
			return $hasil;	
		}

		function updateSkema($kodeSkema) {
			//data yang diedit
			$data['nipAdmin'] = $this->session->userdata('Username');
			$data['verifikasiSkema']= $_POST['verifikasiSkema'];

			//update tbskema set $data where 
			$this->db->where('kodeSkema', $kodeSkema);
			$this->db->update('tbskema', $data);

			$this->session->set_flashdata('pesan','Data Berhasil Diedit');
			redirect(base_url('Controller_Admin/table/tbskema/skema_table'));
		}

		function simpanPegawai() {
			$data=$_POST;
			$password =$this->password();
			$data['password']=$password;
			$this->db->insert('tbpegawai',$data);

			$dataLogin = array(
				'username' => $data['nipPegawai'],
				'password' => $password,
				'level' => '1'
			);
			$this->db->insert('tblogin',$dataLogin);
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan!');	

		}
   }
		
?>