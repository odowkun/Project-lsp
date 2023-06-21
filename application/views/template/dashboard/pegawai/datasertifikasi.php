<div class="container mt-3">
	<div class="row g-4">
		<div class="col-sm-12 col-xl-12">
			<div class="rounded h-100 p-4 border border-dark">
				<h2>Data Sertifikasi</h2>
				<hr class="mb-4">
				<div class="row mb-3">
					<label class="col-sm-2 col-form-label">Judul</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="namaSkema" name="namaSkema" value="<?php echo $hasil['namaSkema']; ?>" disabled>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-sm-2 col-form-label">Nomor</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="kodeSkema" name="kodeSkema" value="<?php echo $hasil['kodeSkema']; ?>" disabled>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-sm-2 col-form-label">Tujuan Asesmen</label>
					<div class="col-sm-10">
                        <select class="form-control" name="tujuan" id="tujuan" disabled>
							<option value="<?php echo $hasil['tujuan']; ?>"><?php echo $hasil['tujuan']; ?></option>
                        </select>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>