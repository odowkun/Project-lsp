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

<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-md navbar-dark sticky-top bg-dark bg-body-dark" data-bs-theme="dark">
    <div class="container-fluid d-flex justify-content-between">
      <a class="navbar-brand" href="#">Admin SIM LSP</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myCollapse"
        aria-controls="myCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="myCollapse">
        <div class="navbar-nav">
          <a class="nav-link active d-lg-none" href="#">Verifikasi Skema</a>
          <a class="nav-link d-lg-none" href="#">Grafik Skema</a>
          <a class="nav-link d-lg-none" href="#">Pegawai LSP</a>
          <a class="nav-link" href="#" onclick="logout()">Logout</a>
        </div>
      </div>
    </div>
  </nav>
  
  <!-- content -->
  <div class="container-fluid h-100">
    <div class="row">
      <!-- sidebar -->
      <menu class="col-md-2 d-none sidebar d-lg-block bg-body-secondary  pt-2">
        <div class="sidebar-sticky mt-2">
          <ul class="nav flex-column ">
            <li class="nav-item">
              <a class="nav-link active text-reset  justify-content-between" href="<?php echo base_url("Controller_Admin/tableSkema") ?>">
              <!-- <span data-feather="home"></span> -->
              Verifikasi Skema
              <!-- <span class="badge bg-primary rounded-pill">1</span> -->
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-reset " href="<?php echo base_url("Controller_Admin/grafik") ?>">
            Grafik Skema
            <!-- <span class="badge bg-primary rounded-pill">1</span> -->
          </a>
          
        </li>
        <li class="nav-item">
          <a class="nav-link text-reset" href="<?php echo base_url("Controller_Admin/formPegawai") ?>">
                Pegawai LSP
              </a>
            </li>
          </ul>
        </div>
      </menu>

      <main role="main" class="ml-sm-auto col-lg-10 pt-3 px-4">

        <?php
        if (!empty($table)) {
          echo $table;

        }

        if (!empty($formPegawai)) {
          echo $formPegawai;
        }

        if (!empty($grafik)) {
          echo $grafik;
        }
        ?>

      </main>
    </div>
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