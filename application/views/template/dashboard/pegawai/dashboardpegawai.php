<html>
    <head>
        <title>Sistem Sipenmaru 4B</title>
    </head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <body>

        <nav class="navbar navbar-expand-sm sticky-top bg-dark navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">SIMLSP</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                    <ul class="navbar-nav ">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown">Skema</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo base_url('controller_pegawai/formdaftarskema'); ?>">Kelola Skema</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown">Sertifikasi</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo base_url('controller_pegawai/formdaftarjadwal'); ?>">Jadwal Sertifikasi</a></li>
                                <li><a class="dropdown-item" href="">Kelola Asesi</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="logout()" href="javascript:void(0);">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <?php
                if(empty($konten)){
                    echo "";	
                } else{
                    echo $konten;	
                }
            ?>

            <?php
                if(empty($table)){
                    echo "";	
                } else{
                    echo $table;	
                }
            ?>
        </div>
        
    </body>

    <!-- Logout -->
    <script language="javascript">
	function logout()
	{
		if (confirm("Apakah yakin keluar?"))
		{
			//jalankan fungsinya.
			window.open("<?php echo base_url(); ?>Controller_Pendaftaran/logout","_self");	
		}	
	}
    </script>

    <div id="script"></div>
    <script src="<?php echo base_url(); ?>/jquery/app.js"></script>
    <script language="javascript">
        var site = "<?php echo base_url()?>index.php/";
        var loading_image_large = "<?php echo base_url()?>gambar/loading_large.gif";
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</html>