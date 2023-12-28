<style>
    .hide {
    display: none;
    }
</style>

<h5>Daftar Skema</h5>
<hr>
<?php
$pesan = $this->session->userdata('pesan');
if (!empty($pesan)) {
   echo "
      <div class='alert alert-success alert-dismissable d-flex align-item-center justify-content-between'>
         <div class='text'>".$pesan."</div>
         <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
      </div>
      ";
}
?>
<form action="<?php echo base_url("Controller_Asesi/submitDaftar")?>" method="post" class="needs-validation">
   <div class="mb-3 row">
      <label for="idJurusan" class="col-sm-2 col-form-label">Pilih Skema</label>
      <div class="col-sm-8">
         <select name="idJadwal" id="idJadwal" class="form-select" required onchange="toggleButton()">
            <option value="" disabled selected>Pilih</option>
            <?php
               foreach($dataSkema as $data):
            ?>
               <option value="<?php echo $data->idjadwal ?>"><?php echo $data->namaSkema?></option>
            <?php
                $namaSkema = $data->namaSkema;
                $biaya = $data->biaya;
                $tempat = $data->tempat;
                $periodeMulai = $data->periodeMulai;
                $periodeSelesai = $data->periodeSelesai;
                $sisaSlot = $data->limit;
                $panduan = $data->templateFile;
               endforeach; 
            ?>
         </select>
      </div>
      <div class="col-sm-2">
         <button class="btn btn-primary" type="button" id="onCheck" onclick="runCheck()" disabled>Check Detail</button>
      </div>
   </div>   
   <div class="hide mb-3 row ">
      <label for="" class="col-sm-2 col-form-label"></label>
      <div class="col-sm-8">
         <!-- <button class="btn btn-primary" type="submit">Daftar</button> -->
         <div class="card">
                  <div class="card-body">
                          <h4 class="card-title mb-2 text-center">Detail Skema</h4>
                          <hr>
                           <div class="table-responsive">
                              <table class="table table-hover text-center">
                                <tr>
                                    <th>Nama Skema</th>
                                    <th>Biaya</th>
                                    <th>Tempat</th>
                                    <th>Periode Daftar</th> 
                                    <th>Sisa Slot</th> 
                                    <th>Panduan</th>
                                </tr>
                                <tr>
                                    <td><?php echo $namaSkema?></td>
                                    <td><?php echo $biaya?></td>
                                    <td><?php echo $tempat?></td>
                                    <td><?php echo $periodeMulai." Sampai ".$periodeSelesai?></td>
                                    <td><?php echo ($sisaSlot-0)?></td>
                                    <td><a href="#" target="_blank">Click Here!</a></td>
                                </tr>
                              </table>
                           </div>
                  </div>
               </div>
      </div>
   </div>
   <div class="hide mb-3 row">
      <label for="tujuanAsesmen" class="col-sm-2 col-form-label">Tujuan Assesment</label>
      <div class="col-sm-8">
         <select name="tujuanAsesmen" id="tujuanAsesmen" class="form-select" required>
            <option value="" disabled selected>Pilih</option>
               <option value="0">Sertifikasi</option>
               <option value="1">Sertifikasi Ulang</option>
               <option value="2">Pengakuan Kompetensi Terkini (PKT)</option>
               <option value="3">Rekognisi Pembelajaran Lampau</option>
               <option value="4">Lainnya</option>
         </select>
      </div>
   </div>
   <div class="hide mb-3 row">
      <label for="" class="col-sm-2 col-form-label"></label>
      <div class="col-sm-1">
         <button class="btn btn-warning" type="button" id="onBatal" onclick="runBatal()">Batal</button>
      </div>
      <div class="col-sm-1">
         <button class="btn btn-primary" type="submit">Daftar</button>
      </div>
   </div>
</form>
<hr>
<div class="table-responsive">
<table class="table table-hover">
   <thead>
      <tr>
         <th>No</th>
         <th>Nama Skema</th>
         <th>Periode Daftar</th>
         <th>Status</th>
         <th>Aksi</th>
      </tr>
   </thead>
   <tbody>
      <?php
        if (!empty($hasil)) {
            $i=1;
            foreach ($hasil as $data) : ?>
                <tr>
                    <td>
                        <?php echo $i?>
                    </td>
                    <td>
                        <?php echo $data->namaSkema?>
                    </td>
                    <td>
                        <?php echo $data->periodeMulai." Sampai ".$data->periodeSelesai?>
                    </td>
                    <td>
                        <?php
                            if(!empty($data->verifikasiKelengkapan && $data->verifikasiBayar )) { 
                                if ($data->verifikasiKelengkapan === "Terima" && $data->verifikasiBayar === "Terima" ) {
                                    echo "
                                    <span class='badge bg-success fw-normal'>Anda Diterima</span>
                                    ";
                                } else if ($data->verifikasiKelengkapan === "Tolak" || $data->verifikasiBayar === "Tolak") {
                                    echo "
                                    <span class='badge bg-danger fw-normal '>Data Ditolak, Silahkan di cek kembali!</span>
                                    ";
                                } 
                            } else if(!empty($data->fileKelengkapan && $data->fileBayar )) { 
                              echo "
                              <span class='badge bg-primary fw-normal'>File anda sedang diproses!</span>
                              ";
                           }else {
                                echo "
                                <span class='badge bg-warning fw-normal'>Anda Belum Melengkapi Data!</span>
                                ";
                            }
                        ?>
                    </td>
                    <td>
                        <button class="btn btn-success" onclick="detail(<?php echo $data->idUjian?>)">Detail</button>
                        <button class="btn btn-danger" onclick="batal(<?php echo $data->idUjian?>)">Batal</button>
                    </td>
                </tr>
      <?php
            $i++;
            endforeach;
         }
      ?>

   </tbody>
</table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<!-- Custom JavaScript -->
<script type="text/javascript" >
    let hide = $('.hide');
    
    console.log("masuk pak eko!")

    function toggleButton() {
    var selectElement = document.getElementById('idJadwal');
    var checkButton = document.getElementById('onCheck');

    if (selectElement.value !== "") {
      // Jika ada opsi yang dipilih, aktifkan tombol
      checkButton.removeAttribute('disabled');
    } else {
      // Jika tidak ada opsi yang dipilih, nonaktifkan tombol
      checkButton.setAttribute('disabled', 'disabled');
    }
  }

    function runCheck() {
          document.getElementById('onCheck').disabled = true;

          for (var i = 0; i < hide.length; i += 1) {
            hide[i].style.display = 'flex';
          }
    };

    function runBatal() {
          document.getElementById('onCheck').disabled = false;

          for (var i = 0; i < hide.length; i += 1) {
            hide[i].style.display = 'none';
          }
    };

    function detail(idujian) {
       window.open("<?php echo base_url(); ?>Controller_Asesi/detailDaftar?data="+idujian, "_self");
    }

    function batal(idujian) {
      if (confirm("Apakah yakin membatalkan pendaftaran skema ?")) {
        window.open("<?php echo base_url(); ?>Controller_Asesi/batal?data="+idujian, "_self");
      }
    }
  

</script>

