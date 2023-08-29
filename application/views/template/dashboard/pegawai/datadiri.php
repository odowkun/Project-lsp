<div class="container mt-3">
	<div class="row g-4">
		<div class="col-sm-12 col-xl-12">
			<div class="rounded h-100 p-4 border border-dark">
				<h5>Data Pribadi</h5>
				<hr class="sb-1">
                <table width=100%>
                    <tr>
                        <td width="150px">Nama</td>
                        <td>:</td>
                        <td><?php echo $hasil->namaAsesi ?></td>
                    </tr>
                    <tr>
                        <td>NIK</td>
                        <td>:</td>
                        <td><?php echo $hasil->nomor ?></td>
                    </tr>
                    <tr>
                        <td>Tempat/Tanggal Lahir</td>
                        <td>:</td>
                        <td><?php echo $hasil->tempatLahir ?>/<?php echo $hasil->tanggalLahir ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td><?php echo $hasil->jenisKelamin ?></td>
                    </tr>
                    <tr>
                        <td>Kebangsaan</td>
                        <td>:</td>
                        <td><?php echo $hasil->kebangsaan ?></td>
                    </tr>
                    <tr>
                        <td>Alamat Rumah</td>
                        <td>:</td>
                        <td><?php echo $hasil->alamatRumah ?></td>
                    </tr>
                    <tr>
                        <td>No. Telp</td>
                        <td>:</td>
                        <td><?php echo $hasil->noTelp ?></td>
                    </tr>
                    <tr>
                        <td>Email </td>
                        <td>:</td>
                        <td><?php echo $hasil->email ?></td>
                    </tr>
                    <tr>
                        <td>Kode Pos </td>
                        <td>:</td>
                        <td><?php echo $hasil->kodePos ?></td>
                    </tr>
                    <tr>
                        <td>Pendidikan </td>
                        <td>:</td>
                        <td><?php echo $hasil->kualifikasiPendidikan ?></td>
                    </tr>
                </table>
                <?php /*
                <br/>
                <br/>
                <h5>Data Pekerjaan Sekarang</h5>
				<hr class="sb-1">
                <table width=100%>
                    <tr>
                        <td width="150px">Nama Institusi/ Perusahaan</td>
                        <td>:</td>
                        <td><?php echo $hasil->namaIns ?></td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td><?php echo $hasil->jabatan ?></td>
                    </tr>
                    <tr>
                        <td>Alamat Kantor</td>
                        <td>:</td>
                        <td><?php echo $hasil->alamatKantor ?></td>
                    </tr>
                    <tr>
                        <td>No. Telp/Fax/Email</td>
                        <td>:</td>
                        <td><?php echo $hasil->telpKantor ?>/<?php echo $hasil->emailKantor ?></td>
                    </tr>
                    <tr>
                        <td>Kode Pos</td>
                        <td>:</td>
                        <td><?php echo $hasil->kodePos ?></td>
                    </tr>
                </table>
                */
                ?>
            </div>
        </div>
    </div>
</div>