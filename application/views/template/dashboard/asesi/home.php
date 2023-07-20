<?php
   $nim = $this->session->userdata('Username');
   $nama = $dataDiri[0]->namaAsesi;
   $smester = $dataDiri[0]->smester;
   $jurusan = $dataDiri[0]->jurusan;
   $prodi = $dataDiri[0]->prodi;
   $email = $dataDiri[0]->email;
   $nomorNIK = $dataDiri[0]->nomor;
   $tempatLahir = $dataDiri[0]->tempatLahir;
   $tanggalLahir = $dataDiri[0]->tanggalLahir;
   $jenisKelamin = $dataDiri[0]->jenisKelamin;
   $kebangsaan = $dataDiri[0]->kebangsaan;
   $alamatRumah = $dataDiri[0]->alamatRumah;
   $kodePos = $dataDiri[0]->kodePos;
   $noTelp = $dataDiri[0]->noTelp;
   $kualifikasiPendidikan = $dataDiri[0]->kualifikasiPendidikan;

   $verif = true;
   if($nim == null || $nama == null || $smester == null || $jurusan == null || $prodi == null || $email == null || $nomorNIK == null || $tempatLahir == null || $tanggalLahir == null || $jenisKelamin == null || $kebangsaan == null || $alamatRumah == null || $kodePos == null || $noTelp == null || $kualifikasiPendidikan == null){
      $verif = false;
   }
?>

<!-- <div class="bg-primary-subtle p-2 rounded mb-4 ps-3" style="margin-left: -15px;">
   Selamat Datang
</div> -->
<!-- title  -->

<div class="container-xxl flex-grow-1 container-p-y">
   <div class="row">
      <div class="col-lg-7 mb-4 order-0">
         <?php
            $pesan = $this->session->userdata('pesan');
            if (!empty($pesan)) {
               echo "
                  <div class='alert alert-primary alert-dismissable d-flex align-item-center justify-content-between'>
                     <div class='text'>".$pesan."</div>
                     <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                  </div>
                  ";
            }
         ?>
         <div class="card">
            <div class="d-flex align-items-end row">
               <div class="col-sm-12">
                        <div class="bg-<?php if($verif == false){ echo "warning";}else if($verif == true){ echo "primary";} ?>-subtle p-2 rounded ps-3 m-2" >
                           <?php if($verif == false){ echo "<b>Warning!</b> <br>Silahkan lengkapi data diri!";}else if($verif == true){ echo "<b>Terimakasih!</b> <br>Data anda sudah lengkap!";} ?>
                        </div>
                        <div class="card-body">
                           <div class="d-flex">
                              <p class="col-sm-5">
                                 NIM
                              </p>
                              <p class="col-sm-7">
                                 <?php echo ": ".$nim ?>
                              </p>
                           </div>
                           <div class="d-flex">
                              <p class="col-sm-5">
                                 Nama
                              </p>
                              <p class="col-sm-7">
                                 <?php echo ": ".$nama ?>
                              </p>
                           </div>
                           <div class="d-flex">
                              <p class="col-sm-5">
                                 Smester
                              </p>
                              <p class="col-sm-7">
                                 <?php echo ": ".$smester ?>
                              </p>
                           </div>
                           <div class="d-flex">
                              <p class="col-sm-5">
                                 Jurusan
                              </p>
                              <p class="col-sm-7">
                                 <?php echo ": ".$jurusan ?>
                              </p>
                           </div>
                           <div class="d-flex">
                              <p class="col-sm-5">
                                 Prodi
                              </p>
                              <p class="col-sm-7">
                                 <?php echo ": ".$prodi ?>
                              </p>
                           </div>
                           <div class="d-flex">
                              <p class="col-sm-5">
                                 Email
                              </p>
                              <p class="col-sm-7">
                                 <?php echo ": ".$email ?>
                              </p>
                           </div>
                           <div class="d-flex">
                              <p class="col-sm-5">
                                 No. NIK
                              </p>
                              <p class="col-sm-7">
                                 <?php echo ": ".$nomorNIK ?>
                              </p>
                           </div>
                           <div class="d-flex">
                              <p class="col-sm-5">
                                 Tempat Lahir
                              </p>
                              <p class="col-sm-7">
                                 <?php echo ": ".$tempatLahir ?>
                              </p>
                           </div>
                           <div class="d-flex">
                              <p class="col-sm-5">
                                 Tanggal Lahir
                              </p>
                              <p class="col-sm-7">
                                 <?php echo ": ".$tanggalLahir ?>
                              </p>
                           </div>
                           <div class="d-flex">
                              <p class="col-sm-5">
                                 Jenis Kelamin
                              </p>
                              <p class="col-sm-7">
                                 <?php echo ": ".$jenisKelamin ?>
                              </p>
                           </div>
                           <div class="d-flex">
                              <p class="col-sm-5">
                                 kebangsaan
                              </p>
                              <p class="col-sm-7">
                                 <?php echo ": ".$kebangsaan ?>
                              </p>
                           </div>
                           <div class="d-flex">
                              <p class="col-sm-5">
                                 Alamat
                              </p>
                              <p class="col-sm-7">
                                 <?php echo ": ".$alamatRumah ?>
                              </p>
                           </div>
                           <div class="d-flex">
                              <p class="col-sm-5">
                                 Kode Pos
                              </p>
                              <p class="col-sm-7">
                                 <?php echo ": ".$kodePos ?>
                              </p>
                           </div>
                           <div class="d-flex">
                              <p class="col-sm-5">
                                 No. Telepon
                              </p>
                              <p class="col-sm-7">
                                 <?php echo ": ".$noTelp ?>
                              </p>
                           </div>
                           <div class="d-flex">
                              <p class="col-sm-5">
                                 Kualifikasi Pendidikan
                              </p>
                              <p class="col-sm-7">
                                 <?php echo ": ".$kualifikasiPendidikan ?>
                              </p>
                           </div>
                          <a
                            href="<?php echo base_url("controller_asesi/editData")?>"
                            class="position-absolute bottom-0 end-0 btn btn-primary mb-1 mx-1"
                            >Edit Profile
                           </a>
                        </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-5 col-md-4 order-1">
         <div class="row">
            <div class="col-lg-12 col-md-12 col-6 mb-4">
               <div class="card">
                  <div class="card-body">
                          <!-- <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="../assets/img/icons/unicons/chart-success.png"
                                alt="Data Jurusan"
                                class="rounded"
                              />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt3"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div
                                class="dropdown-menu dropdown-menu-end"
                                aria-labelledby="cardOpt3"
                              >
                                <a
                                  class="dropdown-item"
                                  href="javascript:void(0);"
                                  >View More</a
                                >
                              </div>
                            </div>
                          </div> -->
                          <h4 class="card-title mb-2 text-center">Skema Terdaftar</h4>
                          <hr>
                           <div class="table-responsive">
                              <table class="table table-hover">
                                 <tr>
                                    <th>Nama Skema</th>
                                    <th>Periode pendaftaran</th>
                                    <th>verifikasi Kelengkapan</th> 
                                    <th>verifikasi Pembayaran</th> 
                                 </tr>
                                 <?php
                                 // for ($i = 0; $i < count($hasil); $i++) {
                                 //    $data = $hasil[$i];
                                 ?>
                                    <tr>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                    </tr>
                              <?php
                                 // }
                              ?>
                              </table>
                           </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>   

