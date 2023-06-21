<div class="container mt-3">
	<div class="row g-4">
		<div class="col-sm-12 col-xl-12">
			<div class="rounded h-100 p-4 border border-dark">
				<h2>Data Kelengkapan</h2>
				<hr class="mb-4">
				<div class="table-responsive">
                    <table class="table table-hover table-responsive">
                        <thead class="bg-warning">
                            <tr>
                                <th>No</th>
                                <th>Jenis</th>
                                <th>File</th>
                                <th>Verifikasi</th>
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
                                <td><?php echo $no;  ?></td>
                                <td><?php echo $data->jenis;  ?></td>
                                <td><?php echo $data->file;  ?></td>
                                <td><?php echo $data->verifikasi;  ?></td>
                                <td>
                                    <button type="submit" class="btn btn-primary btn-sm" onclick="">Submit</button>-->
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
		</div>
	</div>
</div>