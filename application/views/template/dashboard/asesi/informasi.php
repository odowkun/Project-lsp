<div>
    <?php if(!empty($tbSkema)){ ?>
    <div class="container-fluid" style="height:90%">
        <div class="container">
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
                            <div class="col-md-1" style="background-color:#0d6efd;">
                            </div>
                            <div class="col-md-11">
                                <div class="card-body">
                                    <h4 class="card-title"><b><?php echo $data->namaSkema ?></b></h4>
                                    <p class="card-text">Pendaftaran <br> <?php echo date('d F Y', strtotime($data->periodeMulai))." hingga ".date('d F Y', strtotime($data->periodeSelesai))?></p>
                                    <p class="card-text">Lokasi : <?php echo $data->tempat?></p>
                                    <p class="card-text mb-0">Sisa Kuota : <?php $limit=($data->limit-0); if($limit < 0){echo "0";}else{echo $limit;}?></p>
                                    <a class="position-absolute bottom-0 end-0 text-uppercase btn btn-outline-dark mb-1 mx-1 <?php if($limit <= 0){echo "disabled";}?>"
                                    href="<?= base_url('Controller_Asesi/detailSkema?datajurusan=') ?> <?= $data->idJurusan.'&dataskema='.$data->kodeSkema?>">next</a>
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
    <?php }else{ ?>
     <div class="container-fluid" style="height:90%">
        <div class="container">
            <div class="text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Informasi</h5>
                <h2 class="mb-0">Belum Ada Skema Terdaftar</h2>
            </div>
        </div>
    </div>
    <?php }?>
</div>