<script language="javascript">
	document.getElementById("sidebar-skema").classList.add("sidebar-active")
   	document.getElementById("sidebar-skema-skema").classList.add("sidebar-active-list")
</script>

<div class="container mt-3">
	<div class="row g-4">
		<div class="col-sm-12 col-xl-12">
			<div class="rounded h-100 p-4 border border-dark">
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
					<div class="row mb-3">
						<label class="col-sm-2 col-form-label">Kode Skema</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="kodeSkema" id="kodeSkema" required>
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-sm-2 col-form-label">Nama Skema</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="namaSkema" name="namaSkema" required>
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-sm-2 col-form-label">Jurusan</label>
						<div class="col-sm-10">
							<select class="form-select" name="idJurusan" id="idJurusan" required>
								<option value="">PILIH</option>
								<?php
									if(empty($hasil)){
										
									} else{
										foreach ($hasil as $data):
											?>
												<option value="<?php echo $data->idJurusan; ?>"><?php echo $data->namaJurusan; ?></option>
											<?php
										endforeach;
									}
								?>
							</select>
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-sm-2 col-form-label">Biaya</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="biaya" name="biaya" required>
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-sm-2 col-form-label">Kapasitas Peserta</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="kapasitasPeserta" name="kapasitasPeserta" required>
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-sm-2 col-form-label">Keterangan</label>
						<div class="col-sm-10">
							<textarea class="form-control" id="keterangan" name="keterangan" required></textarea>
						</div>
					</div>
					<button type="submit" class="btn btn-primary" >Daftar</button>
					<button type="reset" class="btn btn-danger">Reset</button>
				</form>
			</div>
		</div>
	</div>
</div>
