<!doctype html>
<html lang="en">

<head>
  <title>Dashboard Pegawai</title>

  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
</head>

<body style="height: 100vh;">
<!-- NAVBAR -->
  <nav class="navbar navbar-expand-sm shadow bg-white sticky-top d-flex justify-content-between w-100 position-fixed">
    <div class="container-fluid d-flex justify-content-between">
      <a class="navbar-brand" href="<?php echo base_url() ?>">Pegawai SIM LSP</a>

      <!-- NAVBAR-SM-HAMBURGER-BUTTON -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- NAVBAR-CONTENT -->
      <div class="collapse navbar-collapse justify-content-end" id="navbar">
        <div class="navbar-nav">
          <li class="nav-item dropdown d-lg-none">
            <a class="nav-link dropdown-toggle hover" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">Kelola Skema</a>
            <ul class="dropdown-menu" id="navbar-skema">
              <li><a class="dropdown-item" href="<?php echo base_url("controller_pegawai/skema") ?>">Data Skema</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown d-lg-none">
            <a class="nav-link dropdown-toggle hover" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">Kelola Sertifikasi</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?php echo base_url("controller_pegawai/jadwal") ?>">Jadwal Sertifikasi</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url("controller_pegawai/asesi") ?>">Verifikasi Asesi</a></li>
            </ul>
          </li>
          <a class="nav-link hover" style="" onclick="logout()">Logout</a>
        </div>
      </div>
    </div>
  </nav>
  <!-- END-OF-NAVBAR -->

  <!-- SIDEBAR -->
  <main class="d-none d-lg-flex position-fixed h-100 border-end" style="width: 18%; padding-top: 56px;">
    <ul class="nav flex-column w-100">

      <!-- SIDEBAR-SKEMA -->
      <li class="sidebar-hover nav-item icon-link icon-link-hover d-flex justify-content-between w-100 pe-4"
        data-bs-target="#sidebar-skema-list" data-bs-toggle="collapse" id="sidebar-skema">
        <a class="navbar-toggle text-reset nav-link fw-semibold">
          Kelola Skema
        </a>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" bi-chevron-down"
          viewBox="0 0 16 16">
          <path fill-rule="evenodd"
            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
        </svg>
      </li>
      <!-- SIDEBAR-SKEMA-LIST -->
      <div class="show" id="sidebar-skema-list">
        <li class="sidebar-hover nav-item" id="sidebar-skema-skema">
          <a class="nav-link active text-reset d-flex align-items-center justify-content-between ps-4 pe-4"
            href="<?php echo base_url("controller_pegawai/skema") ?>">
            Data Skema
          </a>
        </li>
      </div>
      <!-- END-OF-SKEMA-LIST -->

      <!-- SIDEBAR-SERTIFIKASI -->
      <li class="sidebar-hover nav-item icon-link d-flex justify-content-between w-100 pe-4" id="sidebar-sertifikasi"
        data-bs-target="#sidebar-sertifikasi-list" data-bs-toggle="collapse">
        <a class="navbar-toggle text-reset nav-link fw-semibold">
          Kelola Sertifikasi
        </a>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" bi-chevron-down" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
        </svg>
      </li>
      <!-- SIDEBAR-SERTIFIKASI-LIST -->
      <div class="show" id="sidebar-sertifikasi-list">
        <li class="sidebar-hover nav-item" id="sidebar-sertifikasi-jadwal">
          <a class="ps-4 nav-link text-reset" href="<?php echo base_url("controller_pegawai/jadwal") ?>">
            Jadwal Sertifikasi
          </a>
        </li>
        <li class="sidebar-hover nav-item" id="sidebar-sertifikasi-verifikasi">
          <a class="ps-4 nav-link text-reset" href="<?php echo base_url("controller_pegawai/verifikasi") ?>">
            Verifikasi Asesi
            <?php
            $this->db->where('verifikasiData', null);
            $this->db->from('tbdatakelengkapan');

            $result = $this->db->count_all_results();
            if ($result > 0) {
              echo "<span class='badge bg-primary rounded-pill'>" . $result . "</span>";
            }
            ?>
          </a>
        </li>
      </div>
      <!-- END-OF-SIDEBAR-SERTIFIKASI-LIST -->

    </ul>
  </main>
<!-- END-OF-SIDEBAR -->

  <div class="container-fluid row " style="padding-top: 5rem;">
    <div class="col-auto d-none d-lg-block" style="width: 18%;"></div>
    <main class="col ps-5">
      <?php
      if (!empty($konten)) {
        echo $konten;
      } 
      if (!empty($table)) {
        echo $table;
      } 
      if (!empty($home)) {
        echo $home;
      } else {
        echo "";
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

  <!-- style -->
  <style>
    .hover:hover {
      cursor: pointer;
    }

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

    td{
      padding-bottom: 14px;
      padding-right: 7px;
    }
  </style>

  <!-- ajax -->
  <div id="script"></div>
    <script src="http://localhost/LSP/jquery/app.js"></script>
    <script language="javascript">
        var site = "http://localhost/LSP/index.php/";
        var loading_image_large = "http://localhost/LSP/gambar/loading_large.gif";
    </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

</body>

</html>