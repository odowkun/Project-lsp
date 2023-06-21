<script language="javascript">

    function hapusskema(kodeSkema){
		if(confirm("Apakah yakin menghapus skema ini?")){
			window.open("<?php echo base_url(); ?>controller_pegawai/hapusskema/"+kodeSkema,"_self");	
		}
	}
	
	function editskema(kodeSkema){
		load("controller_pegawai/editskema/"+kodeSkema,"#script");	
	}

    function daftarunit(kodeSkema){
        window.open("<?php echo base_url(); ?>controller_pegawai/unit/"+kodeSkema,"_self");
    }

	
</script>

<div class="container mt-3">
    <br>
    <h2>Data Skema</h2>
	<hr class="mb-4">
    <div class="table-responsive">
        <table class="table table-hover table-responsive">
            <thead class="bg-info">
                <tr>
                    <th>No</th>
                    <th>Nama Skema</th>
                    <th>ID Jurusan</th>
                    <th>Biaya</th>
                    <th>Kapasitas</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th width="120">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(empty($hasil)){
                        ?>
                            <tr>
                                <td colspan="8" align="center">Data Kosong</td>
                            </tr>
                        <?php
                    } else{
                        $no=1;
                        foreach($hasil as $data):
                ?>
                <tr>
                    <td><?php echo $no;  ?></td>
                    <td><?php echo $data->namaSkema;  ?></td>
                    <td><?php echo $data->idJurusan;  ?></td>
                    <td><?php echo $data->biaya;  ?></td>
                    <td><?php echo $data->kapasitasPeserta;  ?></td>
                    <td><?php echo $data->keterangan;  ?></td>
                    <td>
                        <select class="form-select" name="verifikasiSkema" id="verifikasiSkema" disabled>
                            <option value=''>Pilih</option>
                            <option value='Terima'  <?php echo ($data->verifikasiSkema === 'Terima') ?  'selected' : ''; ?>>Aktif</option>
                            <option value='Terima'  <?php echo ($data->verifikasiSkema === 'Tolak') ?  'selected' : ''; ?>>Tolak</option>
                        </select>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" onclick="editskema('<?php echo $data->kodeSkema; ?>');">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm" onclick="hapusskema('<?php echo $data->kodeSkema; ?>');">Hapus</button>
                    </td>
                </tr>
                <tr>
                    <td colspan="8">
                            <button type="button" class="btn btn-success btn-sm" onclick="daftarunit('<?php echo $data->kodeSkema; ?>');">Tambahkan Unit Skema</button>
                            <button type="button" class="btn btn-info btn-sm">Lampiran</button>
                            <button type="button" class="btn btn-primary btn-sm">Detail Skema</button>
                    </td>
                </tr>
                <?php
                        $no++;
                        endforeach;
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>