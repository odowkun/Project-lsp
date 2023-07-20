<?php
	class Model_Asesi extends CI_Model
	{
        function getData($nim){
            return $this->db->get_where('tbasesi', array('nim' => $nim))->result();
        }
		
        function submitData($nim){
			$data=$_POST;
            $this->db->where('nim', $nim)->update('tbasesi',$data);
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan!');
			redirect(base_url('controller_asesi/home'));
        }
		
		function skema(){
			date_default_timezone_set('Asia/Jakarta');

			return $this->db
			->select('*')
			->from('tbskema')
			->join('tbjurusan', 'tbskema.idJurusan = tbjurusan.idJurusan', 'LEFT')
			->join('tbjadwal', 'tbskema.kodeSkema = tbjadwal.kodeSkema', 'left')
			->where('tbskema.verifikasiSkema', 'Terima')
			->where('tbjadwal.periodeSelesai >=', date('Y-m-d'))
			->order_by('tbjadwal.periodeMulai', 'ASC')
			->get()
			->result();	
		}
		
		function pilihSkema(){
			date_default_timezone_set('Asia/Jakarta');

			return $this->db
			->select('*')
			->from('tbskema')
			->join('tbjurusan', 'tbskema.idJurusan = tbjurusan.idJurusan', 'LEFT')
			->join('tbjadwal', 'tbskema.kodeSkema = tbjadwal.kodeSkema', 'left')
			->where('tbskema.verifikasiSkema', 'Terima')
			->where('tbjadwal.periodeMulai <=', date('Y-m-d'))
			->where('tbjadwal.periodeSelesai >=', date('Y-m-d'))
			->order_by('tbskema.namaSkema', 'ASC')
			->get()
			->result();	
		}

		function submitDaftar($nim){
			$data=$_POST;
            $this->db->set("nim", $nim)->insert('tbujian',$data);
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan!');
			redirect(base_url('controller_asesi/daftar'));
        }

		function cekPendaftaran($nim){
			return $this->db
			->select('*')
			->from('tbujian')
			->join('tbjadwal', 'tbujian.idjadwal = tbjadwal.idjadwal', 'LEFT')
			->join('tbskema', 'tbjadwal.kodeSkema = tbskema.kodeSkema', 'LEFT')
			->where('nim', $nim)
			->get()
			->result();
        }

	}
?>