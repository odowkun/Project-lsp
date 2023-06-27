<!doctype html>
<html lang="en">

<head>
  <title>Dashboard Asesi</title>

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
      <a class="navbar-brand" href="#">SIM LSP</a>

      <!-- NAVBAR-SM-HAMBURGER-BUTTON -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- NAVBAR-CONTENT -->
      <div class="collapse navbar-collapse justify-content-end" id="navbar">
        <!-- <a class="nav-item d-lg-none" style="" href="">Data Asesi</a>
        <a class="nav-item d-lg-none" style="" href="">Daftar Skema</a> -->
          <a class="nav-link hover" style="" onclick="logout()">Logout</a>
        </div>
      </div>
    </div>
  </nav>
  <!-- END-OF-NAVBAR -->

  <!-- SIDEBAR -->
  <main class="d-none d-lg-flex position-fixed h-100 border-end" style="width: 18%; padding-top: 56px;">
    <ul class="nav flex-column w-100">

      <!-- SIDEBAR-Asesi -->
          <a class="ps-4 nav-link text-reset" href="<?php echo base_url("Controller_Asesi/home") ?>">Data Asesi</a>
          <a class="ps-4 nav-link text-reset" href="<?php echo base_url("Controller_Asesi/daftarSkema") ?>">Daftar Skema</a>
      <!-- END-OF-SIDEBAR-ASESI-LIST -->

    </ul>
  </main>
<!-- END-OF-SIDEBAR -->

  <div class="container-fluid row " style="padding-top: 5rem;">
    <div class="col-auto d-none d-lg-block" style="width: 18%;"></div>
    <main class="col ps-5">
      <?php
      if (!empty($table)) {
        echo $table;
      } else if (!empty($formPegawai)) {
        echo $formPegawai;
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