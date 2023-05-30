<?php
    class Model_Pegawai extends CI_Model{

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
            $data['nipPegawai']=$this->session->userdata('Username');
            
            $sql="select * from tbskema where kodeSkema = '".$kodeSkema."'";
            $query=$this->db->query($sql);

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

        function tampilunit(){
            $sql="select * from tbunit";
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

        function simpanunit(){
            $data=$_POST;
            $kodeUnit=$data['kodeUnit'];
            
            $sql="select * from tbunit where kodeUnit = '".$kodeUnit."'";
            $query=$this->db->query($sql);

			if($query->num_rows()==0){
                $this->db->insert('tbunit',$data);
				$this->session->set_flashdata('pesan','Data sudah disimpan');
            } else{
                $kode=array('kodeUnit'=>$kodeUnit);
                $this->db->where($kode);
                $this->db->update('tbunit',$data);
				$this->session->set_flashdata('pesan','Data sudah diedit');
            }
        }

        function hapusunit($kodeUnit){
			$sql="delete from tbunit where kodeUnit='".$kodeUnit."'";
			$this->db->query($sql);
		}
        
		function editunit($kodeUnit){
			$sql="select * from tbunit where kodeUnit='".$kodeUnit."'";
			$query=$this->db->query($sql);
			if ($query->num_rows()>0){
				$data=$query->row();
				echo "<script>$('#kodeUnit').val('".$data->kodeUnit."');</script>";
				echo "<script>$('#judulUnit').val('".$data->judulUnit."');</script>";	
				echo "<script>$('#jenisStandar').val('".$data->jenisStandar."');</script>";
				echo "<script>$('#kodeSkema').val('".$data->kodeSkema."');</script>";
			}
		}

        function tampiljadwal(){
            $sql="select * from tbjadwal";
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

        function simpanjadwal(){
            $data=$_POST;
            $idjadwal=$data['idjadwal'];
            
            $sql="select * from tbjadwal where idjadwal = '".$idjadwal."'";
            $query=$this->db->query($sql);

			if($query->num_rows()==0){
                $this->db->insert('tbjadwal',$data);
				$this->session->set_flashdata('pesan','Data sudah disimpan');
            } else{
                $id=array('idjadwal'=>$idjadwal);
                $this->db->where($id);
                $this->db->update('tbjadwal',$data);
				$this->session->set_flashdata('pesan','Data sudah diedit');
            }
        }

        function hapusjadwal($idjadwal){
			$sql="delete from tbjadwal where idjadwal='".$idjadwal."'";
			$this->db->query($sql);
		}
        
		function editjadwal($idjadwal){
			$sql="select * from tbjadwal where idjadwal='".$idjadwal."'";
			$query=$this->db->query($sql);
			if ($query->num_rows()>0){
				$data=$query->row();
				echo "<script>$('#idjadwal').val('".$data->idjadwal."');</script>";
				echo "<script>$('#kodeSkema').val('".$data->kodeSkema."');</script>";	
				echo "<script>$('#periodeMulai').val('".$data->periodeMulai."');</script>";
				echo "<script>$('#periodeSelesai').val('".$data->periodeSelesai."');</script>";
				echo "<script>$('#tempat').val('".$data->tempat."');</script>";
			}
		}

    }
?>