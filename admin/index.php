<?php 
define( 'SEND_TO_HOME', true );
require_once '../session.php';
require_once '../auth.php';    
?>
<!Doctype html>
<html>
  <?php include '../shared/head.php'; ?>
  <style>
    .login{
      min-height:300px;
      border-radius:4px;
      box-shadow:0px 0px 2px black;
      padding:10px;
      padding-bottom:30px;
      background-color:white;
      width:320px;
      position:absolute;
      top:200px;
      left: calc(50% - 160px);

    }
    .head{
      height:350px;
      background-color:#adf7b6!important
    }
    body{
      opacity: 1;
      background-color: #619196 !important
    }
    #logo {
      position:fixed;
      right:20px;
      top:20px;
    }
  </style>
<body> 
  <!-- <img src="../imgs/logo.png" width="100px" height="100px" id="logo"> -->
  <div class="head">
    <img src="../imgs/logoHeader.png"  width="auto" height="auto" class ="img-fluid img-thumbnail" style="margin-top:180px; margin-left:200px;xt-center text-xl-left text-lg-left text-md-left"></h1>
    <!-- <h1 class="p-2 text-white text-center text-xl-left text-lg-left text-md-left">ICLC System</h1> -->
  </div>
  <div> 
  <div class="login"style="margin-left:500px;">
          <center><b><h2 class="mt-2">Login</h2></b></center>
          <form method="" action="" id="loginForm">
            <div class="form-group">
              <label for="userName">Username</label>
              <input class="form-control" id="userName" name="username" placeholder="Input Username" required>
            </div>
            <div class="form-group">
              <label for="userName">Password</label>
              <input class="form-control" type="password" id="password" name="password" placeholder="Input Password" required >
            </div>
             <button type="submit" class="btn btn-primary btn-block">Login</button>
          </form>
  </div>
  </div>
    <?php include '../shared/foot.php'; ?>
    <?php include '../shared/alert.php'; ?>
    <script>
        $("#loginForm").on('submit', function(e){  
            e.preventDefault();
            let data = $("#loginForm");
            let formData = new FormData(data[0]);
            $.ajax({
                method: "POST",
                url: "../process/LoginRoutes.php",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function(e, status, xhr){
                    console.log(status);
                    if(e == 'Username'){
                        alertService.alert({response:"success",message:"Username does not exist!"});
                    } else if(e == 'error'){
                        alertService.alert({response:"success",message:"Incorrect Username or Password!"});
                    } else {
                        window.location.href='dashboard.php';
                    }
                    
                },
                error: function(e, status, xhr){
                    alertService.alert({response:"success",message:"Incorrect Username or Password!"});
                }
            });
        });
    </script>
</body>
</html>