<script language="javascript">

    function hapusskema(kodeSkema){
		if(confirm("Apakah yakin menghapus skema ini?")){
			window.open("<?php echo base_url(); ?>cskema/hapusskema/"+kodeSkema,"_self");	
		}
	}
	
	function editskema(kodeSkema){
		load("cskema/editskema/"+kodeSkema,"#script");	
	}
	
</script>

<div class="container mt-3">
    <h4>Data Skema</h4>
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>Nama Skema</th>
                <th>ID Jurusan</th>
                <th>Biaya</th>
                <th>Kapasitas Peserta</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if(empty($hasil)){
                    ?>
                        <tr>
                            <td colspan="10" align="center">Data Kosong</td>
                        </tr>
                    <?php
                } else{
                    $no=1;
                    foreach($hasil as $data):
            ?>
            <tr>
                <td><?php echo $data->namaSkema;  ?></td>
                <td><?php echo $data->idJurusan;  ?></td>
                <td><?php echo $data->biaya;  ?></td>
                <td><?php echo $data->kapasitasPeserta;  ?></td>
                <td><?php echo $data->keterangan;  ?></td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" onclick="editskema('<?php echo $data->kodeSkema; ?>');">Edit</button>
                    <button type="button" class="btn btn-danger btn-sm" onclick="hapusskema('<?php echo $data->kodeSkema; ?>');">Hapus</button>
                </td>
            </tr>
            <?php
                    endforeach;
                }
            ?>
        </tbody>
    </table>
</div>