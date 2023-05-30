<div class="container mt-3">
    <br>
    <h2>Data Jadwal</h2>
	<hr class="mb-4">
    <table class="table table-hover">
        <thead class="bg-info">
            <tr>
                <th width="50">ID Jadwal</th>
                <th>Kode Skema</th>
                <th>Periode Mulai</th>
                <th>Periode Selesai</th>
                <th>Tempat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if(empty($hasil)){
                    ?>
                        <tr>
                            <td colspan="6" align="center">Data Kosong</td>
                        </tr>
                    <?php
                } else{
                    foreach($hasil as $data):
            ?>
            <tr>
                <td><?php echo $data->idjadwal;  ?></td>
                <td><?php echo $data->kodeSkema;  ?></td>
                <td><?php echo $data->periodeMulai;  ?></td>
                <td><?php echo $data->periodeSelesai;  ?></td>
                <td><?php echo $data->tempat;  ?></td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" onclick="editjadwal(<?php echo $data->idjadwal ?>)">Edit</button>
                    <button type="button" class="btn btn-danger btn-sm" onclick="hapusjadwal(<?php echo $data->idjadwal ?>)">Hapus</button>
                </td>
            </tr>
            <?php
                    endforeach;
                }
            ?>
        </tbody>
    </table>
</div>