<script language="javascript">
	
	function editunit(kodeUnit){
		load("controller_pegawai/editunit/"+kodeUnit,"#script");	
	}
	
</script>

<div class="container mt-3">
    <br>
    <h2>Data Unit</h2>
	<hr class="mb-4">
    <table class="table table-hover">
        <thead class="bg-info">
            <tr>
                <th width="80">Kode Unit</th>
                <th>Nama Unit</th>
                <th>Jenis Standar</th>
                <th>Kode Skema</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if(empty($hasil)){
                    ?>
                        <tr>
                            <td colspan="5" align="center">Data Kosong</td>
                        </tr>
                    <?php
                } else{
                    $no=1;
                    foreach($hasil as $data):
            ?>
            <tr>
                <td><?php echo $data->kodeUnit;  ?></td>
                <td><?php echo $data->judulUnit;  ?></td>
                <td><?php echo $data->jenisStandar;  ?></td>
                <td><?php echo $data->kodeSkema;  ?></td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" onclick="editunit(<?php echo $data->kodeUnit; ?>)">Edit</button>
                </td>
            </tr>
            <?php
                    endforeach;
                }
            ?>
        </tbody>
    </table>
</div>