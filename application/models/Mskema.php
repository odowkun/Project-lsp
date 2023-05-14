<?php
    class Mskema extends CI_Model{

        function tampilskema(){
            $sql="select * from tbskema";
            $query=$this->db->query($sql);
            if($query->num_rows()>0){
                foreach($query->result() as $data){
                    $hasil[]=$data;
                } 
            } else{
                $hasil="";
            }
            return $hasil;
        }

        function simpanskema(){
            $data=$_POST;
            $kodeSkema=$data['kodeSkema'];
            //$data['nipPegawai']=$this->session->userdata('Username');
            
            $sql="select * from tbskema where kodeSkema = '".$kodeSkema."'";
            $query=$this->db->query($sql);
            $data['nipAdmin']="197801112002121003";
            $data['nipPegawai']="13";

			if($query->num_rows()==0){
                $this->db->insert('tbskema',$data);
				$this->session->set_flashdata('pesan','Data sudah disimpan');
            } else{
                $kode=array('kodeSkema'=>$kodeSkema);
                $this->db->where($kode);
                $this->db->update('tbskema',$data);
				$this->session->set_flashdata('pesan','Data sudah diedit');
            }
        }

        function hapusskema($kodeSkema){
			$sql="delete from tbskema where kodeSkema='".$kodeSkema."'";
			$this->db->query($sql);
		}
        
		function editskema($kodeSkema){
			$sql="select * from tbskema where kodeSkema='".$kodeSkema."'";
			$query=$this->db->query($sql);
			if ($query->num_rows()>0){
				$data=$query->row();
				echo "<script>$('#kodeSkema').val('".$data->kodeSkema."');</script>";
				echo "<script>$('#namaSkema').val('".$data->namaSkema."');</script>";	
				echo "<script>$('#idJurusan').val('".$data->idJurusan."');</script>";
				echo "<script>$('#biaya').val('".$data->biaya."');</script>";
				echo "<script>$('#kapasitasPeserta').val('".$data->kapasitasPeserta."');</script>";
				echo "<script>$('#keterangan').val('".$data->keterangan."');</script>";
			}
		}

    }
?>