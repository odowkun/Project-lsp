<div class="container mt-3">
	<div class="row g-4">
		<div class="col-sm-12 col-xl-12">
			<div class="rounded h-100 p-4 border border-dark">
				<h2>Data Kelengkapan</h2>
				<hr class="mb-4">
                <table width=100%>
                    <tr>
                        <td width="50px">No</td>
                        <td>File</td>
                        <td>Verifikasi</td>
                        <td>Aksi</td>
                    </tr>
                    <?php
                        if(empty($hasil)){
                            ?>
                            <tr>
                                <td colspan="4" align="center">Data Kosong</td>
                            </tr>
                            <?php
                        } else{
                            $no=1;
                            $data=$hasil;
                    ?>
                    <tr>
                        <td><?php echo $no;  ?></td>
                        <td><?php echo $data->fileKelengkapan;  ?></td>
                        <form name="verifikasiKelengkapan" id="verifikasiKelengkapan" method="post" action="<?php echo base_url('controller_pegawai/verifikasiKelengkapan/'.$data->idUjian.'') ?>">
                            <td>
                                <select class="form-select" name="verifikasiKelengkapan" id="verifikasiKelengkapan" required>
                                    <option value=''>Pilih</option>
                                    <option value='Terima'  <?php echo ($data->verifikasiKelengkapan === 'Terima') ?  'selected' : ''; ?>>Terima</option>
                                    <option value='Tolak'  <?php echo ($data->verifikasiKelengkapan === 'Tolak') ?  'selected' : ''; ?>>Tolak</option>
                                </select>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            </td>
                        </form>
                    </tr>
                            
                    
                    <?php
                        }
                    ?>
                </table>
			</div>
		</div>
	</div>
</div>