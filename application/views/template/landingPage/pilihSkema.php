<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIM - LSP</title>
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
    <div class="container-fluid py-5" style="height:90%">
        <div class="container py-5">
            <div class="text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Informasi</h5>
                <h2 class="mb-0">Skema Jurusan <?= $tbSkema[0]->namaJurusan?></h2>
            </div>
            <div class="row g-5 d-flex justify-content-center">
                <?php 
                $i = 0;
                foreach ($tbSkema as $data):
                ?>
                <div class="col-lg-6">
                <div class="mt-4 mx-5 shadow">
                    <div class="card bg-light">
                        <div class="row g-0">
                            <div class="col-md-6">
                                <img src="<?php echo base_url() ?>asset/img/blog-1.jpg" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $data->namaSkema ?></h5>
                                    <p class="card-text"><?php echo $data->keterangan ?></p>
                                    <a class="position-absolute bottom-0 end-0 text-uppercase btn btn-outline-dark mb-1 mx-1 "
                                    href="<?= base_url('Controller_LandingPage/detailSkema?datajurusan=') ?> <?= $data->idJurusan.'&dataskema='.$data->kodeSkema?>">next</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <?php
                    $i++;
                    endforeach;
               ?>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5" style="height:10%">
        <a class="text-uppercase btn btn-outline-dark " href="<?= base_url('Controller_LandingPage/tampilawal') ?>">Back!</a>
    </div>

    <footer>
        <p>© Copyright LSP Politeknik Negeri Bali<br>Designed by TIM LSP PNB - 2023</p>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>