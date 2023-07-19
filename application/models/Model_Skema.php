<?php
	class Model_Skema extends CI_Model
	{
		
	function jumlahSkema(){

		return $this->db
		->select('tbjurusan.namaJurusan, tbjurusan.idJurusan, COUNT(IF(tbjadwal.periodeSelesai > CURRENT_DATE(), 1, NULL)) as jumlahverifikasi', false)
		->from('tbjurusan')
		->join('tbskema', 'tbjurusan.idJurusan = tbskema.idJurusan', 'left')
		->join('tbjadwal', 'tbskema.kodeSkema = tbjadwal.kodeSkema', 'left')
		->group_by('tbjurusan.idJurusan')
		->order_by('jumlahverifikasi', 'desc')
		->get()
		->result();
	}


	function informasiSkema($dataIdJurusan, $dataKodeSkema){
		return $this->db
		->select('tbskema.namaSkema, tbunit.kodeSkema,  tbunit.kodeUnit, tbunit.judulUnit, tbunit.jenisStandar, tbskema.idJurusan')
		->from('tbunit')
		->join('tbskema', 'tbunit.kodeSkema = tbskema.kodeSkema')
		->where('tbskema.idJurusan', $dataIdJurusan)
		->where('tbskema.kodeSkema', $dataKodeSkema)
		->order_by('tbunit.kodeSkema')
		->get()
		->result();	
	}
	
	function skema($dataIdJurusan)	{
		date_default_timezone_set('Asia/Jakarta');

		return $this->db
		->select('*')
		->from('tbskema')
		->join('tbjurusan', 'tbskema.idJurusan = tbjurusan.idJurusan', 'LEFT')
		->join('tbjadwal', 'tbskema.kodeSkema = tbjadwal.kodeSkema', 'left')
		->where('tbskema.idJurusan', $dataIdJurusan)
		->where('tbskema.verifikasiSkema', 'Terima')
		->where('tbjadwal.periodeSelesai >=', date('Y-m-d'))
		->order_by('tbjadwal.periodeMulai', 'ASC')
		// ->or_where('verifikasiSkema IS NULL')
		->get()
		->result();	
	}
}