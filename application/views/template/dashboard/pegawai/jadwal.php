<script language="javascript">
	document.getElementById("sidebar-sertifikasi").classList.add("sidebar-active")
   	document.getElementById("sidebar-sertifikasi-jadwal").classList.add("sidebar-active-list")
</script>

<div class="container mt-3">
	<div class="row g-4">
		<div class="col-sm-12 col-xl-12">
			<div class="rounded h-100 p-4 border border-dark">
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
					<div class="row mb-3">
						<label class="col-sm-2 col-form-label">ID Jadwal</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="idjadwal" id="idjadwal" >
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-sm-2 col-form-label">Nama Skema</label>
						<div class="col-sm-10">
							<select class="form-select" name="kodeSkema" id="kodeSkema">
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
					</div>
					<div class="row mb-3">
						<label class="col-sm-2 col-form-label">Periode Mulai</label>
						<div class="col-sm-10">
							<input type="date" class="form-control" id="periodeMulai" name="periodeMulai">	
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-sm-2 col-form-label">Periode Selesai</label>
						<div class="col-sm-10">
							<input type="date" class="form-control" id="periodeSelesai" name="periodeSelesai">	
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-sm-2 col-form-label">Tempat</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="tempat" name="tempat">	
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-sm-2 col-form-label">Kapasitas</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" id="limit" name="limit">	
						</div>
					</div>
					<button type="submit" class="btn btn-primary" onclick="simpanjadwal()">Daftar</button>
					<button type="reset" class="btn btn-danger">Reset</button>
				</form>
			</div>
		</div>
	</div>
</div>
