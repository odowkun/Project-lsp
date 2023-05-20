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
              <li><a class="dropdown-item" href="<?php echo base_url("Controller_Admin/tableSkema") ?>">Verifikasi</a>
              </li>
              <li><a class="dropdown-item" href="<?php echo base_url("Controller_Admin/grafik") ?>">Diterima</a>
              <li>
              <li><a class="dropdown-item" href="<?php echo base_url("Controller_Admin/grafik") ?>">Ditolak</a>
              <li>
              <li><a class="dropdown-item" href="<?php echo base_url("Controller_Admin/grafik") ?>">Grafik</a>
              <li>
            </ul>
          </li>

          <li class="nav-item dropdown d-lg-none">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Pegawai</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?php echo base_url("Controller_Admin/formPegawai") ?>">Data
                  Pegawai</a></li>
            </ul>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?php echo base_url("Controller_Admin/formPegawai") ?>">Tambah</a></li>
            </ul>
          </li>

          <a class="nav-link" onclick="logout()">Logout</a>
        </div>
      </div>

    </div>
  </nav>

  <!-- sidebar -->
  <main class="d-none d-lg-flex bg-body-secondary position-fixed h-100" style="width: 18%; padding-top: 4rem;">


    <ul class="nav flex-column">
      <!-- sidebar - skema -->
      <li class="nav-item icon-link icon-link-hover d-flex justify-content-between" data-bs-target="#sidebar-skema" data-bs-toggle="collapse">
        <a class="navbar-toggle text-reset nav-link">
          Skema </a>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" bi-chevron-down"
          viewBox="0 0 16 16">
          <path fill-rule="evenodd"
            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
        </svg>
      </li>
      <div class="ps-3 show" id="sidebar-skema">
        <li class="nav-item">
          <a class="nav-link active text-reset justify-content-between"
            href="<?php echo base_url("Controller_Admin/tableSkema") ?>">
            Verifikasi
            <!-- <span class="badge bg-primary rounded-pill">1</span> -->
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-reset justify-content-between"
            href="<?php echo base_url("Controller_Admin/tableSkema") ?>">
            Diterima
            <!-- <span class="badge bg-primary rounded-pill">1</span> -->
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-reset justify-content-between"
            href="<?php echo base_url("Controller_Admin/tableSkema") ?>">
            <!-- <span data-feather="home"></span> -->
            Ditolak
            <!-- <span class="badge bg-primary rounded-pill">1</span> -->
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-reset " href="<?php echo base_url("Controller_Admin/grafik") ?>">
            Grafik
            <!-- <span class="badge bg-primary rounded-pill">1</span> -->
          </a>
        </li>
      </div>
      <!-- sidebar - pegawai -->
      <li class="nav-item icon-link d-flex justify-content-between"  data-bs-target="#sidebar-pegawai" data-bs-toggle="collapse">
        <a class="navbar-toggle text-reset nav-link">
          Pegawai LSP </a>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" bi-chevron-down"
          viewBox="0 0 16 16">
          <path fill-rule="evenodd"
            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
        </svg>
      </li>
      <div class="ps-3 show" id="sidebar-pegawai">
        <li class="nav-item">
          <a class="nav-link text-reset" href="<?php echo base_url("Controller_Admin/formPegawai") ?>">
            Data Pegawai
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-reset" href="<?php echo base_url("Controller_Admin/formPegawai") ?>">
            Tambah
          </a>
        </li>
      </div>
      <!-- sidebar - asesi -->

      <li class="nav-item icon-link d-flex justify-content-between" data-bs-target="#sidebar-asesi" data-bs-toggle="collapse">
        <a class="navbar-toggle text-reset nav-link">Asesi</a>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" bi-chevron-down"
          viewBox="0 0 16 16">
          <path fill-rule="evenodd"
            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
        </svg>
      </li>
      <div class="ps-3 show" id="sidebar-asesi">
        <li class="nav-item">
          <a class="nav-link text-reset" href="<?php echo base_url("Controller_Admin/tableAsesi") ?>">
            Verifikasi
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-reset" href="<?php echo base_url("Controller_Admin/tableAsesi") ?>">
            Berkas
          </a>
        </li>
    </ul>
  </main>


  <div class="container-fluid row " style="padding-top: 5rem;">
    <div class="col-auto d-none d-lg-block" style="width: 18%;"></div>
    <main class="col">
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