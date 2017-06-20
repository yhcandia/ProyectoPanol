<!DOCTYPE html>
<html style="background-color:#012C56;">
<head>
  <meta charset="UTF-8">
  <title>Login Pañol</title>
  <link rel="stylesheet" href="view/css/styleLogin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>		
  <div id="login">
  <form id="login_form"  action="<?php echo $helper->url("usuarios","login"); ?>" method="post">
    <div class="field_container">
      <input type="text" name="nnombre" placeholder="User name" required>
    </div>
    
    <div class="field_container">
      <input type="Password" name="npassword" placeholder="Password" required>
      
    </div>
     <div class="field_container">
         
         <label><?php echo $error; ?></label> 
      
    </div> 
    <div  class="field_container">
        <center>
            <button id="sign_in_button">
            <span class="button_text">Ingresar</span>
          </button>
        </div>
            <footer><center><img src="view/img/logo.png" alt="Duoc Uc"/><center></footer>
        </div>
        </center>
    </div>
  </form>
  
  
</body>
</html>
