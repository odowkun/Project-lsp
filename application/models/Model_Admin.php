<?php
	class Model_Admin extends CI_Model
	{
		function password() {
			$kata="ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
			$password=substr(str_shuffle($kata),0,4);
			return $password;
		}
   
   	function tableSkema()	{
			$sql="select * from tbskema";
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
   	function tableAsesi()	{
			$sql="select * from tbasesi";
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
			redirect(base_url('Controller_Admin/tableSkema'));
		}

		function simpanPegawai() {
			$data=$_POST;
			$Password =$this->password();
			$data['password']=$Password;

			// $sql = "select * from tbpegawai where nipPegawai = ".$data['nipPegawai'] ."";
			// $query=$this->db->query($sql);
			// if ($query->num_rows()>0) {
			// 	//edit
			// 	$data=$query->row();
			// 	echo "<script>$('#nipPegawai').val('".$data->nipPegawai."');</script>";
			// 	echo "<script>$('#namaPegawai').val('".$data->namaPegawai."');</script>";	
			// 	echo "<script>$('#jenisKelamin').val('".$data->jenisKelamin."');</script>";
			// 	echo "<script>$('#noHP').val('".$data->noHP."');</script>";
			// 	echo "<script>$('#password').val('".$data->password."');</script>";
			// 	echo "<script>$('#tempatLahir').val('".$data->tempatLahir."');</script>";
			// 	echo "<script>$('#tanggalLahir').val('".$data->tanggalLahir."');</script>";
			// 	var_dump($data);

			// 	$this->session->set_flashdata('mode','edit');	
			// 	$this->session->set_flashdata('pesan', "Data sudah ada, <a href='' class='alert-link'>Edit Data?</a>");
			// } else {
			// }
			$this->db->insert('tbpegawai',$data);
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan!');	

		}
   }
		
?>