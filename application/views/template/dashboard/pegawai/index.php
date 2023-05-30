<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Dashboard Pegawai</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"><link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css'>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/css/styleDashboard.css">

</head>
<body>
<!-- partial:index.partial.html -->
    <nav class="navbar navbar-expand-custom navbar-mainbg">
        <a class="navbar-brand navbar-logo" href="">SIM - LSP </a>
        <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <div class="hori-selector"><div class="left"></div><div class="right"></div></div>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);"><i class="far fa-address-book"></i>Profile</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="javascript:void(0);"><i class="far fa-copy"></i>Daftar Skema</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="logout()" href="javascript:void(0);">logout</a>
                    </li>
                </div>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="container">
            <h1>Gaje</h1>
            <p>This is some text.</p>
        </div>
    </div>
<!-- partial -->
<script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
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
<script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js'></script>
<script type="text/javascript" src="<?php echo base_url() ?>asset/js/scriptDasesi.js"></script>

</body>
</html>
