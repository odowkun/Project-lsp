<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <title>SIM - LSP ADMIN</title>
</head>
<body>
   <nav class="bg-primary d-flex justify-content-between">
      <h4 class="text-white ml-3 mt-2">ADMIN SIM LSP</h4>
      <ul class="nav justify-content-end">
         <li class="nav-item">
            <a class="nav-link text-white" href="javascript:void(0)" onclick="logout()">Logout</a>
         </li>
      </ul>
   </nav>
   <div class="container row position-fixed" style="height: 100%;">
      <section class="col-3 bg-light">
         <button class="btn col bg-light" type="button">tes</button>
         <button class="btn col bg-light" type="button">tes</button>
         <button class="btn col bg-light" type="button">tes</button>
      </section>
      <section class="col ">
         <table class="table">
            <h4 class="">Tabel Skema</h4>
            <thead class="thead-dark">
               <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama Skema</th>
                  <th scope="col">Jurusan</th>
                  <th scope="col">Biaya</th>
                  <th scope="col">Kapasitas</th>
                  <th scope="col">Verifikasi</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td scope="row">1</td>
                  <td>tes</td>
                  <td>yes</td>
                  <td>sekian</td>
                  <td>banyak</td>
                  <td>
                     <select name="" id="" class="custom-select">
                        <option value="">tidak sesuai</option>
                        <option value="">sesuai</option>
                     </select>
                  </td>
               </tr>
            </tbody>
         </table>
      </section>
   </div>

   <!--BOOTSTRAP-->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script language="javascript">
	function logout()
	{
		if (confirm("Apakah anda yakin ingin keluar?"))
		{
			//jalankan fungsinya.
			window.open("<?php echo base_url(); ?>Controller_Pendaftaran/logout","_self");	
		}	
	}
    </script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>