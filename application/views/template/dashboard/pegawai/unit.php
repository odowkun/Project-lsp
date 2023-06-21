<script language="javascript">
	document.getElementById("sidebar-skema").classList.add("sidebar-active")
   	document.getElementById("sidebar-skema-skema").classList.add("sidebar-active-list")
</script>

<div class="container mt-3">
	<div class="row g-4">
		<div class="col-sm-12 col-xl-12">
			<div class="rounded h-100 p-4 border border-dark">
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
					<div class="row mb-3">
						<label class="col-sm-2 col-form-label">Kode Unit</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="kodeUnit" name="kodeUnit">
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-sm-2 col-form-label">Nama Unit</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="judulUnit" name="judulUnit">
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-sm-2 col-form-label">Jenis Standar</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="jenisStandar" name="jenisStandar">
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-sm-2 col-form-label">Kode Skema</label>
						<div class="col-sm-10">
							<input type="text" class="form-control bg-light" id="kodeSkema" name="kodeSkema" value="<?php echo $kode ?>" readonly>
						</div>
					</div>
					<button type="submit" class="btn btn-primary">Daftar</button>
					<button type="reset" class="btn btn-danger">Reset</button>
				</form>
			</div>
		</div>
	</div>
</div>
