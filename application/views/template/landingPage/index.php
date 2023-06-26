<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIM LSP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/css/styleLandingPage.css">
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-sm shadow bg-white sticky-top d-flex justify-content-between w-100 position-fixed">
        <div class="container-fluid d-flex justify-content-between">
            <a class="navbar-brand d-block d-sm-none" href="#">SIM - LSP</a>
            <div class="collapse navbar-collapse justify-content-start d-none d-sm-block" id="navbar">
                <div class="navbar-nav">
                    <a class="navbar-brand" href="#">SIM - LSP</a>
                </div>
            </div>


            <!-- NAVBAR-SM-HAMBURGER-BUTTON -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- NAVBAR-CONTENT -->
            <div class="collapse navbar-collapse justify-content-center" id="navbar">
                <div class="navbar-nav">
                    <a class="nav-link active hover" href="#">Home</a>
                    <a class="nav-link hover" href="#">Information</a>
                    <a class="nav-link hover" href="#">Contact</a>
                </div>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navbar">
                <div class="navbar-nav">
                    <a class="nav-link hover" href="<?= base_url('Controller_Pendaftaran/pendaftaran') ?>">Login</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- END-OF-NAVBAR -->


    <!-- content -->
    <div class="container-fluid position-relative p-0">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="<?php echo base_url() ?>asset/img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 ">Sistem Informasi Manajemen</h5>
                            <h1 class="display-1 text-white mb-md-4 ">Lembaga Sertifikasi Profesi<br>Politeknik Negeri
                                Bali</h1>
                            <a href="quote.html" class="btn btn-primary py-md-3 px-md-5 me-3">Informasi Skema</a>
                            <a href="" class="btn btn-outline-light py-md-3 px-md-5">Login</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="<?php echo base_url() ?>asset/img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3">Sistem Informasi Manajemen</h5>
                            <h1 class="display-1 text-white mb-md-4">Lembaga Sertifikasi Profesi<br>Politeknik Negeri
                                Bali</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3">Informasi Skema</a>
                            <a href="" class="btn btn-outline-light py-md-3 px-md-5">Login</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Informasi</h5>
                <h1 class="mb-0">Skema Jurusan</h1>
            </div>
            <div class="row g-5">
                <?php 
                $i = 0;
                foreach ($jumlahVerifikasi as $data):
                ?>
                <div class="col-lg-4">
                    <div class="blog-item bg-light rounded overflow-hidden shadow">
                        <div class="blog-img position-relative overflow-hidden">
                            <img class="img-fluid" src="<?php echo base_url() ?>asset/img/blog-1.jpg" alt="">
                            <a class="position-absolute end-0 bg-success text-white rounded-start py-2 px-4"
                                href=""><?php echo $data->namaJurusan ?></a>
                        </div>
                        <div class="p-4">
                            <h4 class="mb-3"><?php echo $data->jumlahverifikasi ?> Skema Aktif</h4>
                            <p>Klik pada tombol next untuk mengetahui lebih jelas terkait skema yang aktif! </p>
                            <a class="text-uppercase btn btn-outline-dark " href="<?= base_url('Controller_LandingPage/Skema?data=') ?> <?= $data->idJurusan?>">next</a>
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

    <!-- end skema -->

    <div class="container-fluid py-5 contain-contact">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-5">
                    <div class="bg-light rounded h-100 d-flex align-items-center p-2">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126171.55604784518!2d115.07104742670538!3d-8.799115199999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd244c13ee9d753%3A0x6c05042449b50f81!2sPoliteknik%20Negeri%20Bali!5e0!3m2!1sid!2sid!4v1685939389553!5m2!1sid!2sid"
                            width="500" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade" class="framemap">
                        </iframe>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-light text-uppercase">Kontak Kami</h5>
                        <h1 class="mb-0 text-light">Lembaga Sertifikasi Profesi - PNB</h1>
                        <hr style="height: 2px; background-color: white; border: none;">
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h5 class="mb-4 text-light">Jalan Bukit Jimbaran Badung - Bali</h5>
                        </div>
                    </div>
                    <p class="mb-4 text-light">Hubungi kontak dibwah ini jika memiliki pertanyaan atau kendala mengenai
                        pendaftaran skema secara online.</p>
                    <div class="d-flex align-items-center mt-2">
                        <div>
                            <h5 class="mb-2 text-light">Email</h5>
                            <h4 class="text-light mb-0">infolsp@pnb.ac.id</h4>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2 text-light">Nomor Telp.</h5>
                            <h4 class="text-light mb-0">+1 5589 55488 55</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>© Copyright LSP Politeknik Negeri Bali<br>Designed by TIM LSP PNB - 2023</p>
    </footer>


    // <script language="javascript">
    //     function skema(namaJurusan){
    //         window.open("<?php echo base_url()?>Controller_LandingPage/Skema"+namaJurusan,"_self")
    //     }
    // </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>