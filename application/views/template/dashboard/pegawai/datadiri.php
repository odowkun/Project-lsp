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
                        <td><?php //echo $hasil->nik ?></td>
                    </tr>
                    <tr>
                        <td>Tempat/Tanggal Lahir</td>
                        <td>:</td>
                        <td><?php //echo $hasil->TempatLahir ?>/<?php //echo $hasil->tanggalLahir ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td><?php //echo $hasil->jk ?></td>
                    </tr>
                    <tr>
                        <td>Kebangsaan</td>
                        <td>:</td>
                        <td><?php //echo $hasil->kebangsaan ?></td>
                    </tr>
                    <tr>
                        <td>Alamat Rumah</td>
                        <td>:</td>
                        <td><?php //echo $hasil->alamatRumah ?></td>
                    </tr>
                    <tr>
                        <td>No. Telp</td>
                        <td>:</td>
                        <td><?php //echo $hasil->telpP ?></td>
                    </tr>
                    <tr>
                        <td>Email </td>
                        <td>:</td>
                        <td><?php //echo $hasil->emailP ?></td>
                    </tr>
                    <tr>
                        <td>Kode Pos </td>
                        <td>:</td>
                        <td><?php //echo $hasil->kpp ?></td>
                    </tr>
                </table>
                
                <br/>
                <br/>
                <h5>Data Pekerjaan Sekarang</h5>
				<hr class="sb-1">
                <table width=100%>
                    <tr>
                        <td width="150px">Nama Institusi/ Perusahaan</td>
                        <td>:</td>
                        <td><?php //echo $hasil->namaInstitusi ?></td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td><?php //echo $hasil->jabatan ?></td>
                    </tr>
                    <tr>
                        <td>Alamat Kantor</td>
                        <td>:</td>
                        <td><?php //echo $hasil->alamatKantor ?></td>
                    </tr>
                    <tr>
                        <td>No. Telp/Fax/Email</td>
                        <td>:</td>
                        <td><?php //echo $hasil->telpK ?>/<?php //echo $hasil->fax ?>/<?php //echo $hasil->emailK ?></td>
                    </tr>
                    <tr>
                        <td>Kode Pos</td>
                        <td>:</td>
                        <td><?php //echo $hasil->kpk ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>