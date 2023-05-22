<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard-Pegawai</title>
    <style>
        body{
            margin: 0;
            padding: 0;
            background-color: purple;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .container {
            color:black;
            margin: auto;
        }

        .container h1{
            font-size: 50px;
        }

        .btn{
            width: 100%;
            background-color: black;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hello World!</h1>
        <button type="button" class="btn" href="javascript:void(0)" onclick="logout()">Logout</button>
    </div>

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
</body>
</html>