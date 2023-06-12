<?php
	class Model_Admin extends CI_Model
	{
   
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

		// ============================ SKEMA ============================

		function updateSkema($kodeSkema) {
			//data yang diedit
			$data['nipAdmin'] = $this->session->userdata('Username');
			$data['verifikasiSkema']= $_POST['verifikasiSkema'];

			//update tbskema set $data where 
			$this->db->where('kodeSkema', $kodeSkema);
			$this->db->update('tbskema', $data);

			$this->session->set_flashdata('pesan','Data Berhasil Diedit');
			redirect(base_url('controller_admin/skema'));
		}

		// ============================ PEGAWAI ============================
		function submitPegawai($pass) {
			$data=$_POST;
			$nip = $this->db->get_where('tbPegawai', array('nipPegawai'=>$data['nipPegawai']));
			if (!empty($nip)) {
				$data['password']=$pass;
				$this->db->insert('tbpegawai',$data);
	
				$dataLogin = array(
					'username' => $data['nipPegawai'],
					'password' => $data['password'],
					'level' => '1'
				);
				$this->db->insert('tblogin',$dataLogin);
				$this->session->set_flashdata('pesan','Data Berhasil Ditambahkan! Password : '.$pass);
			} else {
				$this->db->where('nipPegawai', array('nipPegawai'=>$data['nipPegawai']))
				->update('tbPegawai', $data);
				$this->session->set_flashdata('pesan','Data Berhasil Diedit!');
			}
		}

		function editPegawai($nipPegawai) {
			$query=$this->db->get_where('tbpegawai', array('nipPegawai'=>$nipPegawai));
			if ($query->num_rows()>0){
				$data=$query->row();
				echo "<script>$('#nipPegawai').val('".$data->nipPegawai."')</script>";
				echo "<script>$('#namaPegawai').val('".$data->namaPegawai."')</script>";	
				echo "<script>$('#jenisKelamin').val('".$data->jenisKelamin."')</script>";
				echo "<script>$('#noHP').val('".$data->noHP."')</script>";
				echo "<script>$('#tempatLahir').val('".$data->tempatLahir."')</script>";
				echo "<script>$('#tanggalLahir').val('".$data->tanggalLahir."')</script>";
			}
		}

		function hapusPegawai($nipPegawai) {
			$this->db->delete('tbpegawai', array('nipPegawai'=>$nipPegawai));
			$this->db->delete('tblogin', array('username'=>$nipPegawai));
			$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');
		}
		
		// ============================ ASESI =============================
		function editAsesi($nim) {
			$query=$this->db->get_where('tbasesi', array('nim'=>$nim));
			if ($query->num_rows()>0){
				$data=$query->row();
				echo "<script>$('#nim').val('".$data->nim."');</script>";
				echo "<script>$('#namaAsesi').val('".$data->namaAsesi."');</script>";	
				echo "<script>$('#smester').val('".$data->smester."');</script>";
				echo "<script>$('#email').val('".$data->email."');</script>";
				echo "<script>$('#jurusan').val('".$data->jurusan."');</script>";
				echo "<script>$('#prodi').val('".$data->prodi."');</script>";
			}
		}

		// ============================ JURUSAN ============================
		function submitJurusan() {
			$data=$_POST;
			if (empty($data['nipAdmin'])) {
				$this->session->set_flashdata('pesan', 'Anda Tidak Memiliki Akses!');
			} else if (empty($data['idJurusan'])) {
				$this->db->insert('tbJurusan', $data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!');
			} else {
				$this->db
				->where('idJurusan', $data['idJurusan'])
				->update('tbJurusan', $data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
			}
		}


		function editJurusan($idJurusan) {
			$query=$this->db->get_where('tbjurusan', array('idJurusan'=>$idJurusan));
			if ($query->num_rows()>0){
				$data=$query->row();
				echo "<script>$('#idJurusan').val('".$data->idJurusan."');</script>";
				echo "<script>$('#namaJurusan').val('".$data->namaJurusan."');</script>";	
				echo "<script>$('#nipAdmin').val('".$this->session->userdata("Username")."');</script>";
			}
		}
		function hapusJurusan($idJurusan) {
			$this->db->delete('tbJurusan', array('idJurusan'=>$idJurusan));
			$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');
		}
		
		// ============================ PRODI =============================
		function submitProdi() {
			$data = $_POST;
			$idProdi = $data['idProdi'];
			$query = $this->db
			->get_where('tbProdi', array('idProdi'=>$idProdi))
			->row();
			if (!empty($query)) {
				$this->db
				->where('idProdi', $data['idProdi'])
				->update('tbProdi', $data);
				$this->session->set_flashdata('pesan', "Data Berhasil Diedit");
			} else {
				$this->db->insert('tbProdi', $data);
				$this->session->set_flashdata('pesan', "Data Berhasil Ditambahkan!");
			}
		}

		function editProdi($idProdi) {
			$query=$this->db->get_where('tbProdi', array('idProdi'=>$idProdi));
			if ($query->num_rows()>0){
				$data=$query->row();
				echo "<script>$('#idProdi').val('".$data->idProdi."');</script>";
				echo "<script>$('#tingkatProdi').val('".$data->tingkatProdi."');</script>";	
				echo "<script>$('#namaProdi').val('".$data->namaProdi."');</script>";
				echo "<script>$('#idJurusan').val('".$data->idJurusan."');</script>";
			}
		}

		function hapusProdi($idProdi) {
			$this->db->delete('tbProdi', array('idProdi' => $idProdi));
			$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');
		}
		
		function tes($idProdi) {
			$query=$this->db
         ->select('*')
         ->from('tbProdi')
         ->join('tbJurusan', 'tbJurusan.idJurusan = tbProdi.idJurusan')
         ->get();
			var_dump($query->result());
		}
   }
		
?>