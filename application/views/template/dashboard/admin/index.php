<!doctype html>
<html lang="en">

<head>
  <title>Dashboard Admin</title>

  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>

</head>

<body style="height: 100vh;">

  <!-- navbar -->
  <nav
    class="navbar navbar-expand-sm navbar-dark sticky-top bg-dark bg-body-dark d-flex justify-content-between w-100 position-fixed"
    data-bs-theme="dark">
    <div class="container-fluid d-flex justify-content-between">
      <a class="navbar-brand" href="<?php echo base_url("Controller_Dashboard/admin") ?>">Admin SIM LSP</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
        aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbar">
        <div class="navbar-nav">
          <li class="nav-item dropdown d-lg-none">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="" aria-expanded="false">Skema</a>
            <ul class="dropdown-menu" id="navbar-skema">
              <li><a class="dropdown-item" href="<?php echo base_url("Controller_Admin/table/tbskema/skema_table") ?>">Verifikasi</a>
              </li>
              <li><a class="dropdown-item" href="<?php echo base_url("Controller_Admin/grafik") ?>">Grafik</a>
              <li>
            </ul>
          </li>
          <li class="nav-item dropdown d-lg-none">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Pegawai LSP</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?php echo base_url("Controller_Admin/table/tbpegawai/pegawai_table") ?>">DataPegawai</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url("Controller_Admin/formPegawai") ?>">Tambah</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown d-lg-none">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Asesi</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?php echo base_url("Controller_Admin/table/tbasesi/asesi_table") ?>">Verifikasi</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url("Controller_Admin/table/tbasesi/asesi_table") ?>">Berkas</a></li>
            </ul>
          </li>
          <a class="nav-link hover" style="" onclick="logout()">Logout</a>
        </div>
      </div>

    </div>
  </nav>

  <!-- sidebar-style -->
  <style>
    .hover:hover {cursor: pointer;}
    .sidebar-hover:hover {
      background-color: #ccc;
      cursor: pointer;
      color: black;
    }
    .sidebar-active {
      background-color: #ddd;
      cursor: pointer;
    }
    .sidebar-active-list {
      background-color: #eaeaea;
      cursor: pointer;
      color: black;
    }
  </style>

  <!-- SIDEBAR -->
  <main class="d-none d-lg-flex  position-fixed h-100" style="width: 18%; padding-top: 56px;">
    <ul class="nav flex-column w-100">
      <!-- SIDEBAR-SKEMA -->
      <li class="sidebar-hover nav-item icon-link icon-link-hover d-flex justify-content-between w-100 pe-4"
        data-bs-target="#sidebar-skema-list" data-bs-toggle="collapse" id="sidebar-skema">
        <a class="navbar-toggle text-reset nav-link">
          Skema </a>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" bi-chevron-down"
          viewBox="0 0 16 16">
          <path fill-rule="evenodd"
            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
        </svg>
      </li>
      <!-- SIDEBAR-SKEMA-LIST -->
      <div class="show" id="sidebar-skema-list">
        <li class="sidebar-hover nav-item" id="sidebar-skema-verifikasi">
          <a class="nav-link active text-reset d-flex align-items-center justify-content-between ps-4 pe-4"
            href="<?php echo base_url("Controller_Admin/table/tbskema/skema_table") ?>">
            Verifikasi

            <?php
                $this->db->where('verifikasiSkema', null);
                $this->db->from('tbskema');
                
                $result = $this->db->count_all_results();
                if ($result > 0 ) {
                echo "<span class='badge bg-primary rounded-pill'>".$result."</span>"; 
                }
              ?>
          </a>
        </li>
        <li class="sidebar-hover nav-item" id="sidebar-skema-grafik">
          <a class="nav-link text-reset ps-4" style="" href="<?php echo base_url("Controller_Admin/grafik") ?>">
            Grafik
          </a>
        </li>
      </div>
      <!-- SIDEBAR-PEGAWAI -->
      <li class="sidebar-hover nav-item icon-link d-flex justify-content-between w-100 pe-4" id="sidebar-pegawai"
        data-bs-target="#sidebar-pegawai-list" data-bs-toggle="collapse">
        <a class="navbar-toggle text-reset nav-link">
          Pegawai LSP </a>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" bi-chevron-down"
          viewBox="0 0 16 16">
          <path fill-rule="evenodd"
            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
        </svg>
      </li>
      <div class="show" id="sidebar-pegawai-list">
        <li class="sidebar-hover nav-item" id="sidebar-pegawai-data">
          <a class="ps-4 nav-link text-reset" href="<?php echo base_url("Controller_Admin/table/tbpegawai/pegawai_table") ?>">
            Data Pegawai
          </a>
        </li>
        <li class="sidebar-hover nav-item" id="sidebar-pegawai-tambah">
          <a class="ps-4 nav-link text-reset" href="<?php echo base_url("Controller_Admin/formPegawai") ?>">
            Tambah
          </a>
        </li>
      </div>
      <!-- SIDEBAR-ASESI -->
      <li class="sidebar-hover nav-item icon-link d-flex justify-content-between w-100 pe-4" id="sidebar-asesi"
        data-bs-target="#sidebar-asesi-list" data-bs-toggle="collapse">
        <a class="navbar-toggle text-reset nav-link">Asesi</a>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" bi-chevron-down"
          viewBox="0 0 16 16">
          <path fill-rule="evenodd"
            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
        </svg>
      </li>
      <!-- SIDEBAR-ASESI-LIST -->
      <div class="show" id="sidebar-asesi-list">
        <li class="sidebar-hover nav-item" id="sidebar-asesi-verifikasi">
          <a class="ps-4 nav-link text-reset" href="<?php echo base_url("Controller_Admin/table/tbasesi/asesi_table") ?>">
            Verifikasi
          </a>
        </li>
        <li class="sidebar-hover nav-item" id="sidebar-asesi-berkas">
          <a class="ps-4 nav-link text-reset" href="<?php echo base_url("Controller_Admin/table/tbasesi/asesi_table") ?>">
            Berkas
          </a>
        </li>
    </ul>
  </main>


  <div class="container-fluid row " style="padding-top: 5rem;">
    <div class="col-auto d-none d-lg-block" style="width: 18%;"></div>
    <main class="col ps-4">
      <?php
      if (!empty($table)) {
        echo $table;
      } else if (!empty($formPegawai)) {
        echo $formPegawai;
      } else if (!empty($grafik)) {
        echo $grafik;
      } else {
        echo $card;
      }
      ?>
    </main>
  </div>

  <!-- logout -->
  <script>
    function logout() {
      if (confirm("Apakah yakin keluar?")) {
        window.open("<?php echo base_url(); ?>Controller_Pendaftaran/logout", "_self");
      }
    }
  </script>
  <!-- ajax -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

</body>

</html>