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
			->from("tbskema")
			->where("verifikasiSkema", "terima")
			->join("tbjurusan", "tbskema.idJurusan = tbjurusan.idJurusan")
			->group_by("tbskema.idJurusan")
			->get()
			->result();
		}
		function grafik() {
			return $this->db
			->select("namaJurusan, count(tbujian.idjadwal) as asesi")
			->from("tbskema")
			->join("tbjadwal", "tbskema.kodeskema = tbjadwal.kodeskema")
			->join("tbujian", "tbujian.idjadwal = tbjadwal.idjadwal")
			->join("tbjurusan", "tbjurusan.idJurusan = tbskema.idJurusan")
			->where("verifikasiKelengkapan", "Terima")
			->where("verifikasiBayar", "Terima")
			->group_by("tbujian.idJadwal")
			->order_by("asesi", 'DESC')
			->get();
		}

		function grafikChart() {
			$query = $this->grafik();
			$string = "";
			if($query->num_rows() != 0) {
				for ($i = 0; $i < $query->num_rows(); $i++) {
					$string .= "['" . $query->result()[$i]->namaJurusan . "', " . $query->result()[$i]->asesi . "], ";
				}
			} else {
				$string = "['',0]";
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
			redirect(base_url('Controller_Admin/skema'));
		}

		// ============================ PEGAWAI ============================
		function submitPegawai($pass) {
			$data=$_POST;
			$nipPegawai = $data['nipPegawai'];
			$nip = $this->db->get_where('tbpegawai', array('nipPegawai'=>$nipPegawai));
			if ($nip->num_rows() == 0) {
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
				$this->db->where('nipPegawai', $nipPegawai);
				$this->db->update('tbpegawai', $data);
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

		function detailAsesi($nim) {
			return  $this->db
			->select('tbujian.nim, idUjian, namaAsesi, jurusan, namaSkema, periodeMulai, periodeSelesai, tempat, verifikasiKelengkapan, verifikasiBayar')
			->from('tbujian')
			->join('tbasesi', 'tbujian.nim = tbasesi.nim')
			->join('tbjadwal', 'tbjadwal.idjadwal = tbujian.idjadwal')
			->join('tbskema', 'tbskema.kodeSkema = tbjadwal.kodeSkema')
			->where('tbujian.nim', $nim)
			->get()
			->result();
		}
		function berkas($bol) {
			$this->db
			->select('tbujian.nim, tbujian.idUjian, namaAsesi, namaSkema, verifikasiKelengkapan, verifikasiBayar')
			->from('tbujian')
			->join('tbasesi', 'tbujian.nim = tbasesi.nim')
			->join('tbjadwal', 'tbjadwal.idjadwal = tbujian.idjadwal')
			->join('tbskema', 'tbskema.kodeSkema = tbjadwal.kodeSkema')
			->order_by('verifikasiKelengkapan', 'asc')
			->order_by('verifikasiBayar', 'asc')
			->order_by('namaSkema', 'asc');
			// FILTER UNTUK HOMEPAGE
			if($bol) {
				$this->db->where('verifikasiKelengkapan', 'terima');
				$this->db->where('verifikasiBayar', 'terima');
			}
			return $this->db->get()
			->result();
		}

		// ============================ BERKAS ============================
		function submitBerkas($id, $value) {
			$data['verifikasiKelengkapan'] = $value;
			$this->db->where("idUjian", $id);
			$this->db->update('tbujian', $data);
		}
		function submitBayar($id, $value) {
			$data['verifikasiBayar'] = $value;
			$this->db->where("idUjian", $id);
			$this->db->update('tbujian', $data);
		}

		// ============================ JURUSAN ============================
		function submitJurusan() {
			$data=$_POST;
			if (empty($data['nipAdmin'])) {
				$this->session->set_flashdata('pesan', 'Anda Tidak Memiliki Akses!');
			} else if (empty($data['idJurusan'])) {
				$this->db->insert('tbjurusan', $data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!');
			} else {
				$this->db
				->where('idJurusan', $data['idJurusan'])
				->update('tbjurusan', $data);
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
			$this->db->delete('tbjurusan', array('idJurusan'=>$idJurusan));
			$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');
		}
		
		// ============================ PRODI =============================
		function submitProdi() {
			$data = $_POST;
			$idProdi = $data['idProdi'];
			$query = $this->db
			->get_where('tbprodi', array('idProdi'=>$idProdi))
			->row();
			if (!empty($query)) {
				$this->db
				->where('idProdi', $data['idProdi'])
				->update('tbprodi', $data);
				$this->session->set_flashdata('pesan', "Data Berhasil Diedit");
			} else {
				$this->db->insert('tbprodi', $data);
				$this->session->set_flashdata('pesan', "Data Berhasil Ditambahkan!");
			}
		}

		function editProdi($idProdi) {
			$query=$this->db->get_where('tbprodi', array('idProdi'=>$idProdi));
			if ($query->num_rows()>0){
				$data=$query->row();
				echo "<script>$('#idProdi').val('".$data->idProdi."');</script>";
				echo "<script>$('#tingkatProdi').val('".$data->tingkatProdi."');</script>";	
				echo "<script>$('#namaProdi').val('".$data->namaProdi."');</script>";
				echo "<script>$('#idJurusan').val('".$data->idJurusan."');</script>";
			}
		}

		function hapusProdi($idProdi) {
			$this->db->delete('tbprodi', array('idProdi' => $idProdi));
			$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');
		}
		
		// ============================ PRODI =============================
		function ubahPassword() {
			$data = $_POST;
			$old = $this->db
			->get_where('tblogin', array('username'=>$this->session->userdata('Username')))
			->result();
			if ($data['oldpassword'] === $old[0]->password) {
				if ($data['password'] === $data['newpassword']) {
					$this->db
					->where('username', $this->session->userdata('Username'))
					->update('tblogin', array('password'=>$data['password']));
					$this->session->set_flashdata('pesan', 'Password Berhasil Diubah!');
				} else {
					$this->session->set_flashdata('pesan', 'Password Tidak Sama!');
				}
			} else {
				$this->session->set_flashdata('pesan', 'Password Lama Salah!');
			}
		}
		function tes($idProdi) {
			$query=$this->db
         ->select('*')
         ->from('tbprodi')
         ->join('tbjurusan', 'tbjurusan.idJurusan = tbprodi.idJurusan')
         ->get();
			var_dump($query->result());
		}
   }
		
?>