<?php
	class Model_Admin extends CI_Model
	{
   
   	function table($namaTabel)	{
			return $this->db->get($namaTabel)->result();
		}
		function tableWhere($namaTabel, $where) {
			return $this->db->get_where($namaTabel, $where)->result();
		}
   	function tableSkema()	{
			return $this->db
			->select("count(tbskema.idJurusan) as jumlah, namaJurusan")
			->from("tbSkema")
			->join("tbjurusan", "tbskema.idJurusan = tbJurusan.idJurusan")
			->group_by("tbskema.idJurusan")
			->get()
			->result();
		}
		function grafik() {
			return $this->db
			->select();
		}

		function lgrafik() {
			$query = $this->tableSkema();
			$string = "";
			foreach ($query as $data) {
				$string .= "'".$data->namaJurusan."', ";
			}
			return $string;
		}
		function dgrafik() {
			$query = $this->tableSkema();
			$string = "";
			foreach ($query as $data) {
				$string .= "'".$data->jumlah."', ";
			}
			return $string;
		}

		// ============================ SKEMA ============================

		function updateSkema($kodeSkema, $pilih) {
			//data yang diedit
			$data['nipAdmin'] = $this->session->userdata('Username');
			$data['verifikasiSkema']= $pilih;

			//update tbskema set $data where 
			$this->db->where('kodeSkema', $kodeSkema);
			$this->db->update('tbskema', $data);

			$this->session->set_flashdata('pesan','Data Berhasil Disimpan!');
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
		function submitAsesi($pass) {
			$data=$_POST;
			$master = $this->db->get_where('masterdata', array('nim'=>$data['nim']));
			if ($master->num_rows() > 0) {
				$login = $this->db->get_where('tblogin', array('nim'=>$data['nim']));
				if (!$login->num_rows()>0) {
					if($master[0]->smester > 7) {
						$data['password']=$pass;
						$this->db->insert('tbasesi',$data);
			
						$dataLogin = array(
							'username' => $data['nim'],
							'password' => $data['password'],
							'level' => '2'
						);
						// $this->db->insert('tblogin',$dataLogin);
						$this->session->set_flashdata('pesan','Data Berhasil Ditambahkan! Password : '.$pass);
					} else {
						$this->session->set_flashdata('pesan', 'Mahasiswa harus semester 7 keatas!');
					}
				} else {
					$this->session->set_flashdata('pesan', 'NIM Sudah mendaftar');
				}
			} else {
				$this->session->set_flashdata('pesan', 'NIM Tidak Terdaftar!');
			}
		}

		function detailAsesi($nim) {
			return  $this->db
			->select('tbskema.kodeSkema, namaSkema, periodeMulai, periodeSelesai, tempat, verifikasiDaftar')
			->from("tbdatakelengkapan")
			->join('tbujian', 'tbujian.idujian = tbdatakelengkapan.idujian')
			->join('tbjadwal', 'tbjadwal.idjadwal = tbujian.idjadwal')
			->join('tbskema', 'tbskema.kodeSkema = tbjadwal.kodeSkema')
			->where('tbujian.nim', $nim)
			->get()
			->result();
			var_dump($query);
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