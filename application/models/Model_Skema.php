<?php
	class Model_Skema extends CI_Model
	{

	function jumlahSkema(){
		return $this->db
		->select('namaJurusan, tbjurusan.idJurusan,  COUNT(verifikasiSkema) as jumlahverifikasi')
		->from('tbjurusan')
		->join('tbskema', 'tbjurusan.idJurusan = tbskema.idJurusan', 'left')
		->where('verifikasiSkema', 'Terima')
		->or_where('verifikasiSkema IS NULL')
		->group_by('namaJurusan')
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
		return $this->db
		->select('*')
		->from('tbskema')
		->join('tbjurusan', 'tbskema.idJurusan = tbjurusan.idJurusan', 'LEFT')
		->where('tbskema.idJurusan', $dataIdJurusan)
		->get()
		->result();	
	}
}