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
<!-- NAVBAR -->
  <nav class="navbar navbar-expand-sm shadow bg-white sticky-top d-flex justify-content-between w-100 position-fixed">
    <div class="container-fluid d-flex justify-content-between">
      <a class="navbar-brand" href="<?php echo base_url("controller_admin/home") ?>">Admin SIM LSP</a>

      <!-- NAVBAR-SM-HAMBURGER-BUTTON -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- NAVBAR-CONTENT -->
      <div class="collapse navbar-collapse justify-content-end" id="navbar">
        <div class="navbar-nav">
          <li class="nav-item dropdown d-lg-none">
            <a class="nav-link dropdown-toggle hover" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">Kelola LSP</a>
            <ul class="dropdown-menu" id="navbar-skema">
              <li><a class="dropdown-item" href="<?php echo base_url("controller_admin/jurusan") ?>">Data Jurusan</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url("controller_admin/prodi") ?>">Data Program Studi</a><li>
              <li><a class="dropdown-item" href="<?php echo base_url("controller_admin/skema") ?>">Data Skema</a><li>
            </ul>
          </li>
          <li class="nav-item dropdown d-lg-none">
            <a class="nav-link dropdown-toggle hover" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">Kelola User</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?php echo base_url("controller_admin/pegawai") ?>">Kelola Pegawai</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url("controller_admin/asesi") ?>">Kelola Asesi</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown d-lg-none">
            <a class="nav-link dropdown-toggle hover" data-bs-toggle="dropdown" data-bs-auto-close="outside"aria-expanded="false">Asesi</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?php echo base_url("controller_admin/home") ?>">Verifikasi</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url("controller_admin/home") ?>">Berkas</a></li>
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

      <!-- SIDEBAR-LSP -->
      <li class="sidebar-hover nav-item icon-link icon-link-hover d-flex justify-content-between w-100 pe-4"
        data-bs-target="#sidebar-lsp-list" data-bs-toggle="collapse" id="sidebar-lsp">
        <a class="navbar-toggle text-reset nav-link fw-semibold">
          Kelola LSP</a>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
          <path fill-rule="evenodd"
            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
        </svg>
      </li>
      <!-- SIDEBAR-LSP-LIST -->
      <div class="show bg-body-tertiary" id="sidebar-lsp-list">
        <li class="sidebar-hover nav-item" id="sidebar-lsp-jurusan">
          <a class="nav-link active text-reset d-flex align-items-center justify-content-between ps-4 pe-4"
            href="<?php echo base_url("controller_admin/jurusan") ?>">
            Data Jurusan
          </a>
        </li>
        <li class="sidebar-hover nav-item" id="sidebar-lsp-prodi">
          <a class="nav-link text-reset ps-4" href="<?php echo base_url("controller_admin/prodi") ?>">
            Data Prodi
          </a>
        </li>
        <li class="sidebar-hover nav-item" id="sidebar-lsp-skema">
          <a class="nav-link text-reset ps-4" href="<?php echo base_url("controller_admin/skema") ?>">
            Data Skema

            <?php
            $result = $this->db
            ->where('verifikasiSkema', null)->from('tbskema')
            ->count_all_results();
            if ($result > 0) {
              echo "<span class='badge bg-primary rounded-pill'>" . $result . "</span>";
            }
            ?>
          </a>
        </li>
      </div>
      <!-- END-OF-LSP-LIST -->

      <!-- SIDEBAR-USER -->
      <li class="sidebar-hover nav-item icon-link d-flex justify-content-between w-100 pe-4" id="sidebar-user"
        data-bs-target="#sidebar-user-list" data-bs-toggle="collapse">
        <a class="navbar-toggle text-reset nav-link fw-semibold">
          Kelola User</a>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
          <path fill-rule="evenodd"
            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
        </svg>
      </li>
      <!-- SIDEBAR-USER-LIST -->
      <div class="show bg-body-tertiary" id="sidebar-user-list">
        <li class="sidebar-hover nav-item" id="sidebar-user-pegawai">
          <a class="ps-4 nav-link text-reset"
            href="<?php echo base_url("controller_admin/pegawai") ?>">
            Kelola Pegawai
          </a>
        </li>
        <li class="sidebar-hover nav-item" id="sidebar-user-asesi">
          <a class="ps-4 nav-link text-reset" href="<?php echo base_url("controller_admin/asesi") ?>">
            Kelola Asesi
          </a>
        </li>
        <li class="sidebar-hover nav-item" id="sidebar-user-berkas">
          <a class="ps-4 nav-link text-reset" href="<?php echo base_url("controller_admin/berkas") ?>">
            Kelola Berkas
            <?php
            $result = $this->db
            ->where('verifikasiKelengkapan', null)
            ->or_where('verifikasiBayar', null)
            ->from('tbujian')
            ->count_all_results();
            if ($result > 0) {
              echo "<span class='badge bg-primary rounded-pill'>" . $result . "</span>";
            }
            ?>
          </a>
        </li>
      </div>
      <!-- ENDOF-SIDEBAR-USER-LIST -->

    </ul>
  </main>
<!-- END-OF-SIDEBAR -->

  <div class="container-fluid row " style="padding-top: 5rem;">
    <div class="col-auto d-none d-lg-block" style="width: 18%;"></div>
    <main class="col ps-5">
      <?php
      if (!empty($table)) {
        echo $table;
      } else if (!empty($home)) {
        echo $home;
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