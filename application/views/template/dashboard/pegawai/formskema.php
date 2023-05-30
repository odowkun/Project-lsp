<script language="javascript">
	function simpanskema(){
        var kodeSkema=$('#kodeSkema').val();
		if (kodeSkema==""){
			alert ("Kode Skema masih kosong");
			$('#kodeSkema').focus();
			return false;	
		}	
		
		var namaSkema=$('#namaSkema').val();
		if (namaSkema==""){
			alert ("Nama Skema masih kosong");
			$('#namaSkema').focus();
			return false;	
		}

		var idJurusan=$('#idJurusan').val();
		if (idJurusan==""){
			alert ("Jurusan masih kosong");
			$('#idJurusan').focus();
			return false;	
		}

		var biaya=$('#biaya').val();
		if (biaya==""){
			alert ("Biaya masih kosong");
			$('#biaya').focus();
			return false;	
		}

		var kapasitasPeserta=$('#kapasitasPeserta').val();
		if (kapasitasPeserta==""){
			alert ("Kapasitas Peserta masih kosong");
			$('#kapasitasPeserta').focus();
			return false;	
		}

		var keterangan=$('#keterangan').val();
		if (keterangan==""){
			alert ("Keterangan masih kosong");
			$('#keterangan').focus();
			return false;	
		}
		
		$('#formdaftarskema').submit();

    }
</script>

<div class="container mt-3">
	<h2>Daftar Skema</h2>
	<hr class="mb-4">
    <?php
        $pesan=$this->session->flashdata('pesan');
        if($pesan==""){
            echo "";
        } else{
            ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <?php echo $pesan; ?>
                </div>
            <?php
        }
    ?>
  
  
	<form name="formdaftarskema" id="formdaftarskema" method="post" action="<?php echo base_url('controller_pegawai/simpanskema') ?>">
		<div class="mb-3 mt-3">
			<label>Kode Skema</label>
			<input type="text" class="form-control" name="kodeSkema" id="kodeSkema" >
		</div>
		<div class="mb-3 mt-3">
			<label>Nama Skema</label>
			<input type="text" class="form-control" id="namaSkema" name="namaSkema">
		</div>
		<div class="mb-3 mt-3">
			<label>Jurusan</label>
			<select class="form-control" name="idJurusan" id="idJurusan">
				<option value="">PILIH</option>
				<option value="1">Teknik Elektro</option>
				<option value="2">Teknik Mesin</option>
				<option value="3">Teknik Sipil</option>
				<option value="4">Pariwisata</option>
				<option value="5">Akutansi</option>
				<option value="6">Administrasi Bisnis</option>
			</select>
		</div>
		<div class="mb-3 mt-3">
			<label>Biaya</label>
			<input type="text" class="form-control" id="biaya" name="biaya">
		</div>
		<div class="mb-3 mt-3">
			<label>Kapasitas Peserta</label>
			<input type="text" class="form-control" id="kapasitasPeserta" name="kapasitasPeserta">
		</div>
		<div class="mb-3 mt-3">
			<label>Keterangan</label>
			<textarea class="form-control" id="keterangan" name="keterangan"></textarea>
		</div>
		<button type="button" class="btn btn-primary" onclick="simpanskema()">Daftar</button>
		<button type="reset" class="btn btn-danger">Reset</button>
    </form>
</div>
