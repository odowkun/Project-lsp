<?php
$pesan=$this->session->flashdata('pesan');
if (!empty($pesan)) {
      echo "
         <div class='alert alert-success d-flex align-item-center justify-content-between'>
         <div class='text'>
            ".$pesan."
         </div>
            <a class='btn-close' href='". base_url('controller_admin/password')."'></a>
         </div>
         ";
   }
?>
<form action="<?php echo base_url("controller_admin/ubahpassword")?>" method="post" class="needs-validation">
   <div class="mb-3 row">
      <label for="password" class="col-sm-2 col-form-label">Old Password</label>
      <div class="col-sm-10">
         <input type="password" class="form-control" id="oldpassword" name="oldpassword" required>
      </div>
   </div>
   <div class="mb-3 row">
      <label for="password" class="col-sm-2 col-form-label">New Password</label>
      <div class="col-sm-10">
         <input type="password" class="form-control" id="password" name="password" required>
      </div>
   </div>
   <div class="mb-3 row">
      <label for="password" class="col-sm-2 col-form-label">New Password</label>
      <div class="col-sm-10">
         <input type="password" class="form-control" id="newpassword" name="newpassword" required>
      </div>
   </div>
   <div class="mb-3 row">
      <div class="col-sm-2 col-form-label"></div>
      <div class="col-sm-10">
         <button type="submit" class="btn btn-primary">Submit</button>
      </div>
   </div>
</form>