<div class="boxright">
    <div class="container-boxright">
      <img src="https://www.pnb.ac.id/img/logo-pnb.3aae610b.png" alt="#">
      <h1>Hello! Welcome back</h1>
      <form name="formlogin" id="formlogin" method="post" action="<?php echo base_url('Controller_Pendaftaran/proseslogin'); ?>">
        <div class="errorMessage">
              <p id="errorText"></p>
        </div>
        <div class="form-group">
          <label id="coba">Username</label>
          <input type="text" name="username" class="form-control" placeholder="Type your username" id="usernameLogin">
          <span class="invalid-feedback"></span>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" class="form-control" placeholder="Type your password" id="passwordLogin">
          <span class="invalid-feedback"></span>
        </div>
        <div class="form-group">
        <button type="submit" class="login-btn" onclick="validation()" >Submit</button>
          <p class="footer">Need an account? <a href="<?= base_url('Controller_Pendaftaran/registrasi') ?>">Sign up here!</a>
          </p>
        </div>
      </form>
  </div>
</div>

</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<!-- Custom JavaScript -->
<script type="text/javascript" src="<?php echo base_url() ?>asset/js/scriptLoginForm.js"></script>

</body>

</html>
