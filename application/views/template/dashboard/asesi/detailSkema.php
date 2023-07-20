<div>
   <div class="container-fluid" style="height:100%">
        <div class="container"></div>
            <div class="text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Informasi</h5>
                <h2 class="mb-0">Detail Skema  <?= $hasil[0]->namaSkema?></h2>
            </div>
            <div class="row g-5">
                <div class="col-lg-9">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th>Kode Unit</th>
                                <th>Nama Unit Kompetensi</th>
                                <th>Jenis Standar</th>
                            </tr>
                            <?php
                            for ($i = 0; $i < count($hasil); $i++) {
                                $data = $hasil[$i];
                            ?>
                                <tr>
                                    <td><?php echo $data->kodeUnit ?></td>
                                    <td><?php echo $data->judulUnit ?></td>
                                    <td><?php echo $data->jenisStandar ?></td>
                                    </tr>
                        <?php
                            }
                        ?>
                        </table>
                    </div>
                </div>
                <div class="col-md-2">
                    <h5>Unduh Panduan</h5>
                    <a class="text-uppercase btn btn-primary mb-4" href="#">Download file</a>
                    <h5>Biaya</h5>
                    <p class="text-bg-secondary text-white  p-1 d-inline rounded "><?= $tbSkema[0]->biaya?></p>
                    <br>
                    <div class="d-inline-flex p-2 bg-info rounded my-4 text-secondary"><Strong>Info! </Strong> <?= $tbSkema[0]->keterangan?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5 mt-5">
        <a class="text-uppercase btn btn-outline-dark " href="<?= base_url('Controller_asesi/informasi') ?>">Back!</a>
    </div>
</div>