<?php
    class Model_Pegawai extends CI_Model{

        //============================== DATA ==============================
        function datajurusan(){
            $this->db->select('idJurusan, namaJurusan');
            $query=$this->db->get('tbjurusan');
            if($query->num_rows()>0){
                foreach($query->result() as $data){
                    $hasil[]=$data;
                } 
            } else{
                $hasil="";
            }
            return $hasil;
        }

        function dataskema(){
            $this->db->select('kodeSkema, namaSkema');
            $this->db->where('verifikasiSkema', 'Terima');
            $query=$this->db->get('tbskema');
            if($query->num_rows()>0){
                foreach($query->result() as $data){
                    $hasil[]=$data;
                } 
            } else{
                $hasil="";
            }
            return $hasil;
        }
        //==================================================================

        //============================== SKEMA ==============================
        function tampilskema(){
            $query=$this->db->get('tbskema');
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
            $data['verifikasiSKema']=null;
            $data['nipAdmin']=null;
            
            $query=$this->db->get_where('tbskema', array('kodeSkema' => $kodeSkema));

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
            $this->db->delete('tbunit', array('kodeSkema' => $kodeSkema));
            $this->db->delete('tbjadwal', array('kodeSkema' => $kodeSkema));
			$this->db->delete('tbskema', array('kodeSkema' => $kodeSkema));
		}
        
		function editskema($kodeSkema){
			$query=$this->db->get_where('tbskema', array('kodeSkema' => $kodeSkema));
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
        //===================================================================

        //============================== UNIT ==============================
        function tampilunit($kodeSkema){
            $query=$this->db->get_where('tbunit', array('kodeSkema' => $kodeSkema));
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
            $id=$data['kodeSkema'];
            
            $query=$this->db->get_where('tbunit', array('kodeUnit' => $kodeUnit));

			if($query->num_rows()==0){
                $this->db->insert('tbunit',$data);
				$this->session->set_flashdata('pesan','Data sudah disimpan');
            } else{
                $kode=array('kodeUnit'=>$kodeUnit);
                $this->db->where($kode);
                $this->db->update('tbunit',$data);
				$this->session->set_flashdata('pesan','Data sudah diedit');
            }
			redirect('controller_pegawai/unit/'.$id.'');
            
        }

        function hapusunit($kodeUnit){
            $query=$this->db->get_where('tbunit', array('kodeUnit' => $kodeUnit));
            $id=$query->row('kodeSkema');
            $this->db->delete('tbunit', array('kodeUnit' => $kodeUnit));
            redirect('controller_pegawai/unit/'.$id.'');
		}
        
		function editunit($kodeUnit){
			$query=$this->db->get_where('tbunit', array('kodeUnit' => $kodeUnit));
			if ($query->num_rows()>0){
				$data=$query->row();
				echo "<script>$('#kodeUnit').val('".$data->kodeUnit."');</script>";
				echo "<script>$('#judulUnit').val('".$data->judulUnit."');</script>";	
				echo "<script>$('#jenisStandar').val('".$data->jenisStandar."');</script>";
				echo "<script>$('#kodeSkema').val('".$data->kodeSkema."');</script>";
			}
		}
        //==================================================================

        //============================== JADWAL ==============================
        function tampiljadwal(){
            $query=$this->db->get('tbjadwal');
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
            
            $query=$this->db->get_where('tbjadwal', array('idjadwal' => $idjadwal));
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
			$this->db->delete('tbjadwal', array('idjadwal' => $idjadwal));
		}
        
		function editjadwal($idjadwal){
			$query=$this->db->get_where('tbjadwal', array('idjadwal' => $idjadwal));
			if ($query->num_rows()>0){
				$data=$query->row();
				echo "<script>$('#idjadwal').val('".$data->idjadwal."');</script>";
				echo "<script>$('#kodeSkema').val('".$data->kodeSkema."');</script>";	
				echo "<script>$('#periodeMulai').val('".$data->periodeMulai."');</script>";
				echo "<script>$('#periodeSelesai').val('".$data->periodeSelesai."');</script>";
				echo "<script>$('#tempat').val('".$data->tempat."');</script>";
			}
		}
        //====================================================================

        //============================== VERIFIKASI ASESI ==============================
        function tampilpendaftar(){
            $this->db->from('tbasesi');
            $this->db->join('tbujian', 'tbasesi.nim=tbujian.nim');
            $this->db->where('verifikasiKelengkapan', null);
            $query=$this->db->get();
            if($query->num_rows()>0){
                foreach($query->result() as $data){
                    $hasil[]=$data;
                }
            } else{
                $hasil="";
            }
            return $hasil;
        }

        function datadiri($nim){
            $query=$this->db->get_where('tbasesi', array('nim' => $nim));
            if($query->num_rows()>0){
                $hasil=$query->row();
            } else{
                $hasil="";
            }
            return $hasil;
        }

        function datasertifikasi($idUjian){
            $query=$this->db->get_where('tbujian', array('idUjian' => $idUjian));
            if($query->num_rows()>0){
                $this->db->from('tbskema');
                $this->db->join('tbjadwal', 'tbskema.kodeSkema=tbjadwal.kodeSkema');
                $this->db->join('tbujian', 'tbjadwal.idjadwal=tbujian.idjadwal');
                $this->db->where('idUjian', $idUjian);
                $data=$this->db->get();
                $hasil['namaSkema']=$data->row('namaSkema');
                $hasil['kodeSkema']=$data->row('kodeSkema');
                $hasil['tujuan']="Sertifikasi";
            } else{
                $hasil="";
            }
            return $hasil;
        }

        function hapuspendaftar($idUjian){
            $this->db->delete('tbujian', array('idUjian' => $idUjian));
		}
        //==============================================================================

    }
?>