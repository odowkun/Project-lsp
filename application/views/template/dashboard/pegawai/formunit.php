<script language="javascript">
	function simpanunit(){
        var kodeUnit=$('#kodeUnit').val();
		if (kodeUnit==""){
			alert ("Kode Unit masih kosong");
			$('#kodeUnit').focus();
			return false;	
		}	
		
		var judulUnit=$('#judulUnit').val();
		if (judulUnit==""){
			alert ("Nama Unit masih kosong");
			$('#judulUnit').focus();
			return false;	
		}

		var jenisStandar=$('#jenisStandar').val();
		if (jenisStandar==""){
			alert ("Jenid Standar masih kosong");
			$('#jenisStandar').focus();
			return false;	
		}
        var kodeSkema=$('#kodeSkema').val();
		if (kodeSkema==""){
			alert ("Kode Skema masih kosong");
			$('#kodeSkema').focus();
			return false;	
		}	
		
		$('#formdaftarunit').submit();

    }
</script>

<div class="container mt-3">
	<h2>Daftar Unit Skema</h2>
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
  
  
	<form name="formdaftarunit" id="formdaftarunit" method="post" action="<?php echo base_url('controller_pegawai/simpanunit') ?>">
		<div class="mb-3 mt-3">
			<label>Kode Unit</label>
			<input type="text" class="form-control" id="kodeUnit" name="kodeUnit">
		</div>
		<div class="mb-3 mt-3">
			<label>Nama Unit</label>
			<input type="text" class="form-control" id="judulUnit" name="judulUnit">
		</div>
		<div class="mb-3 mt-3">
			<label>Jenis Standar</label>
			<textarea class="form-control" id="jenisStandar" name="jenisStandar"></textarea>
		</div>
		<div class="mb-3 mt-3">
			<label>Kode Skema</label>
			<input type="text" class="form-control" id="kodeSkema" name="kodeSkema">
		</div>
		<button type="button" class="btn btn-primary" onclick="simpanunit()">Daftar</button>
		<button type="reset" class="btn btn-danger">Reset</button>
    </form>
</div>
