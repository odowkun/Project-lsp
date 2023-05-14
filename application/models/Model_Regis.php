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
			$data->password=$Password;
			$this->db->insert('tbasesi',$data);
			// masukkan data email dan password
			// $dataasesi['email']=$Email;
			// $dataasesi['password']=$Password;
			// $this->db->insert('tbasesi',$dataasesi);

			// masuk ke tblogin
			$datalogin['username']=$Username;
			$datalogin['password']=$Password;
			$datalogin['level']=2;
			$this->db->insert('tblogin',$datalogin);
			// redirect('Controller_Pendaftaran/pendaftaran');

			// $account=array(
			// 	'Username'=>$Username,
			// 	'Password'=>$Password
			// );

			$account = $Password;
			
			return $account;
		}

		function tampiltable()
		{
			$sql="select * from tbskema";
			$query=$this->db->query($sql);
			if($query->num_rows()>0)
			{
				foreach($query->result() as $data)
				{
					$hasil[]=$data;	
				}	
			}
			else
			{
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

			$this->session->set_flashdata('pesan','Data sudah diedit');
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
			$this->session->set_flashdata('pesan','Data berhasil disimpan!');	

		}
		
	}
?>