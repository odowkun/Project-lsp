<div class="boxright">
    <div class="container-boxright">
      <img src="https://www.pnb.ac.id/img/logo-pnb.3aae610b.png" alt="#">
      <h1>Create your account!</h1>
      <form name="formregis"  id="formregis" method="post" action="<?php echo base_url('Controller_Pendaftaran/prosesregis'); ?>">
        <div class="form-group">
          <label>Student ID Number</label>
          <div class="container-student-id">
            <input type="number" onkeydown="return event.keyCode !== 69" name="nim" class="form-control" id="nim" placeholder="Please check your Student ID Number">
            <input type="number" name="containNIM" style="display: none" id="containNIM">
            <button type="button" class="check" id="onCheck" onclick="runCheck()">Check!</button>
            <span class="invalid-feedback"></span>
          </div>
          <div class="errorMessage">
              <p id="errorText"></p>
          </div>
        </div>
        <div class="form-group hide">
          <label>Email</label>
          <input type="email" name="email" id="email" class="form-control" placeholder="Type your email">
          <span class="invalid-feedback"></span>
        </div>
        <div class="form-group hide">
          <button type="button" class="login-btn" id="onSubmit" onclick="runSubmit()">Submit</button>
        </div>
        <div class="form-group">
          <p class="footer">Already have an account? <a href="<?= base_url('Controller_Pendaftaran/pendaftaran') ?>">Sign in here!</a>
          </p>    
        </div>
      </form>
  </div>
  <div id="myPopup" class="popup">
        <div class="popup-content">
            <h1>Your Account!</h1>
            <p id="account"></p>
            <button id="closePopup">Close</button>
        </div>
  </div>
</div>


</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<!-- Custom JavaScript -->
<script type="text/javascript" >
    let hide = $('.hide');
    let errorMessage = $('.errorMessage');
    let errorText = document.getElementById("errorText");
    
    console.log("masuk pak eko!")

    function runCheck() {
      let nim = $('#nim').val();
      $.post("cekasesi", {nim: nim}, function (data){
        let valid = data;
        console.log("coba" + nim)
        console.log(valid);
        if (nim == "" || null) {
          errorMessage[0].style.display = 'flex';
          errorText.innerText = 'Please Input your Student ID Number';
          // alert("error")
        } else if (valid == "true") {
          let oncheck = document.getElementById('onCheck');
          let nim = $('#nim').val();
          document.getElementById('containNIM').value = nim;
          document.getElementById('nim').disabled = true;
          
          oncheck.style.backgroundColor = "red";
          oncheck.innerText = "Reset!";

          oncheck.onclick = () => {
            location.reload();
          }

          for (var i = 0; i < hide.length; i += 1) {
            hide[i].style.display = 'flex';
          }
          errorMessage[0].style.display = 'none';
        }else if(valid == "terdaftar"){
          errorMessage[0].style.display = 'flex';
          errorText.innerText = 'Your Student ID Number is already!';
          document.getElementById('nim').value = "";
        }else if(valid == "smestertidakvalid"){
          errorMessage[0].style.display = 'flex';
          errorText.innerText = 'Please back after smester 7 or 8!';
          document.getElementById('nim').value = "";
        }else {
          errorMessage[0].style.display = 'flex';
          errorText.innerText = 'Your Student ID Number isnt valid!';
          document.getElementById('nim').value = "";
        }
      });
    }

    function runSubmit() {
      
      let nim = $('#containNIM').val();
      let email = $('#email').val();


      if(email == ""){
        let valid = document.getElementById("email");
        valid.classList.add("valid");
        valid.focus();
        errorMessage[0].style.display = 'flex';
        errorText.innerText = 'Please Input your Email';
      }else{
        $.post("prosesregis", {nim: nim, email: email}, function (data){
        let password = data;
        // alert("Username: "+nim + "\nPassword: "+password);

        let submit = $('#submit');
        let Account = document.getElementById('account');

          myPopup.classList.add("show");
          Account.innerText = "Username: " + nim + "\nPassword: "+ password;
    
        closePopup.addEventListener("click", function () {
          myPopup.classList.remove("show");
          location.reload();
        // window.location.href = "";
        });
    
        window.addEventListener("click", function (event) {
          if (event.target == myPopup) {
            myPopup.classList.remove("show");
            location.reload();
            // window.location.href = "";
          }
        });
      });
      }

    }

</script>

    <!-- emailjs -->
    <script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
    </script>
    <script type="text/javascript">
      (function(){
      emailjs.init("QrMNc1K3Me_fQzz1B");
      })();
    </script>
</body>

</html>