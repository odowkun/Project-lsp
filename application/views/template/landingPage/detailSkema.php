<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url() ?>asset/css/styleLandingPage.css">
</head>

<body style="height: 100vh;">
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-sm shadow bg-white sticky-top d-flex justify-content-between w-100 position-fixed">
        <div class="container-fluid d-flex justify-content-between">
            <a class="navbar-brand d-block" href="#">SIM - LSP</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbar">
                <div class="navbar-nav">
                    <a class="nav-link hover" onclick="logout()">Login</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- END-OF-NAVBAR -->

    <!-- content -->
    <div class="container-fluid py-5" style="height:100%">
        <div class="container py-5">
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
        <a class="text-uppercase btn btn-outline-dark " href="<?= base_url('Controller_LandingPage/Skema?data=') ?> <?= $hasil[0]->idJurusan?>">Back!</a>
    </div>

    <footer>
        <p>© Copyright LSP Politeknik Negeri Bali<br>Designed by TIM LSP PNB - 2023</p>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>