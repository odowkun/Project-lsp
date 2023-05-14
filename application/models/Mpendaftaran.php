<?php
	class Mpendaftaran extends CI_Model
	{
		function simpandata()
		{
			$data=$_POST;
			$KodeDaftar=$data['KodeDaftar'];
			if ($KodeDaftar=="")
			{
				//simpan
				$this->db->insert('tbdaftar',$data);
				$this->session->set_flashdata('pesan','Data sudah disimpan');	
			}
			else
			{
				//edit	
				$Kode=array(
					'KodeDaftar'=>$KodeDaftar
				);
				$this->db->where($Kode);
				$this->db->update('tbdaftar',$data);
				$this->session->set_flashdata('pesan','Data sudah diedit');
			}
		}
		
		function tampildata()
		{
			$sql="select * from tbdaftar order by KodeDaftar";
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
		
		function hapusdata($KodeDaftar)
		{
			$sql="delete from tbdaftar where KodeDaftar='".$KodeDaftar."'";
			$this->db->query($sql);
				
		}
		
		function editdata($KodeDaftar)
		{
			$sql="select * from tbdaftar where KodeDaftar='".$KodeDaftar."'";
			$query=$this->db->query($sql);
			if ($query->num_rows()>0)
			{
				$data=$query->row();
				echo "<script>$('#KodeDaftar').val('".$data->KodeDaftar."');</script>";
				echo "<script>$('#NamaLengkap').val('".$data->NamaLengkap."');</script>";	
				echo "<script>$('#Alamat').val('".$data->Alamat."');</script>";
				echo "<script>$('#Telp').val('".$data->Telp."');</script>";
				echo "<script>$('#Email').val('".$data->Email."');</script>";
			}
				
		
		}	
		
		
		
		
		
	}
?>