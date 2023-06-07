<script language="javascript">
	function simpanjadwal(){
        var idjadwal=$('#idjadwal').val();
		if (idjadwal==""){
			alert ("ID Jadwal masih kosong");
			$('#idjadwal').focus();
			return false;	
		}	
		
		var kodeSkema=$('#kodeSkema').val();
		if (kodeSkema==""){
			alert ("Kode Skema masih kosong");
			$('#kodeSkema').focus();
			return false;	
		}

		var periodeMulai=$('#periodeMulai').val();
		if (periodeMulai==""){
			alert ("Periode Mulai masih kosong");
			$('#periodeMulai').focus();
			return false;	
		}

		var periodeSelesai=$('#periodeSelesai').val();
		if (periodeSelesai==""){
			alert ("Periode Selesai masih kosong");
			$('#periodeSelesai').focus();
			return false;	
		}

		var tempat=$('#tempat').val();
		if (tempat==""){
			alert ("Tempat Peserta masih kosong");
			$('#tempat').focus();
			return false;	
		}
		
		$('#formdaftarjadwal').submit();

    }
</script>

<div class="container mt-3">
	<h2>Daftar Jadwal Sertifikasi</h2>
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
  
  
	<form name="formdaftarjadwal" id="formdaftarjadwal" method="post" action="<?php echo base_url('controller_pegawai/simpanjadwal') ?>">
		<div class="mb-3 mt-3">
			<label>ID Jadwal</label>
			<input type="text" class="form-control" name="idjadwal" id="idjadwal" >
		</div>
		<div class="mb-3 mt-3">
			<label>Nama Skema</label>
			<select class="form-control" name="kodeSkema" id="kodeSkema">
				<option value="">PILIH</option>
				<?php
                    if(!empty($hasil)){
						foreach($hasil as $data):
                            ?>
                                <option value="<?php echo $data->kodeSkema?>"><?php echo $data->namaSkema?></option>
                            <?php
                        endforeach;
                    }
                ?>
			</select>
		</div>
		<div class="mb-3 mt-3">
			<label>Periode Mulai</label>
			<input type="date" class="form-control" id="periodeMulai" name="periodeMulai">
		</div>
		<div class="mb-3 mt-3">
			<label>Periode Selesai</label>
			<input type="date" class="form-control" id="periodeSelesai" name="periodeSelesai">
		</div>
		<div class="mb-3 mt-3">
			<label>Tempat</label>
			<input type="text" class="form-control" id="tempat" name="tempat">
		</div>
		<button type="button" class="btn btn-primary" onclick="simpanjadwal()">Daftar</button>
		<button type="reset" class="btn btn-danger">Reset</button>
    </form>
</div>
