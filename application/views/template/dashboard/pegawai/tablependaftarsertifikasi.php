<script language="javascript">
    document.getElementById("sidebar-sertifikasi").classList.add("sidebar-active")
   	document.getElementById("sidebar-sertifikasi-verifikasi").classList.add("sidebar-active-list")
    
    function hapuspendaftar(idUjian){
		if(confirm("Apakah yakin menghapus pendaftar ini?")){
			window.open("<?php echo base_url(); ?>controller_pegawai/hapuspendaftar/"+idUjian,"_self");	
		}
	}
    
    function datadiri(nim){
        window.open("<?php echo base_url(); ?>controller_pegawai/datadiri/"+nim,"_self");
    }

    function datasertifikasi(idUjian){
        window.open("<?php echo base_url(); ?>controller_pegawai/datasertifikasi/"+idUjian,"_self");
    }

</script>

<div class="container mt-3">
    <br>
    <h2>Data Pendaftar Sertifikasi</h2>
	<hr class="mb-4">
    <div class="table-responsive">
        <table class="table table-hover table-responsive">
            <thead class="bg-info">
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jurusan</th>
                    <th>Prodi</th>
                    <th>Verifikasi</th>
                    <th>Aksi</th>
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
                    <td><?php echo $data->nim;  ?></td>
                    <td><?php echo $data->namaAsesi;  ?></td>
                    <td><?php echo $data->email;  ?></td>
                    <td><?php echo $data->jurusan;  ?></td>
                    <td><?php echo $data->prodi;  ?></td>
                    <td>
                    <select class="form-select" name="verifikasi" id="verifikasi">
                        <option value="">PILIH</option>
                        <option value="Terima">Terima</option>
                        <option value="Tolak">Tolak</option>
                    </select>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </td>
                </tr>
                <tr>
                    <td colspan="8">
                            <button type="button" class="btn btn-primary btn-sm" onclick="datadiri('<?php echo $data->nim; ?>');">Data Diri</button>
                            <button type="button" class="btn btn-warning btn-sm" onclick="datasertifikasi('<?php echo $data->idUjian; ?>');">Data Sertifikasi</button>
                            <button type="button" class="btn btn-info btn-sm" onclick="buktikelengkapan('<?php echo $data->idUjian; ?>');">Bukti Kelengkapan</button>
                        
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