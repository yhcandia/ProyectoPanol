<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Cambio de password</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        
  <script language="javascript" type="text/javascript">
            function validapwd() {
                if(document.getElementById("pwd").value==document.getElementById("pwd2").value){
                    //alert("Son iguales");
                    return true;
                        
                }else
                {
                     alert("Las passwords ingresadas son diferentes");
                     
                     return false;
                }
                
            }
   </script>
     <style>
             .container {
               background-color: #fff;
               
               max-width: 300px;
               max-height: 310px;
               min-width: 300px;
               min-height: 250px;
            }
            
            body{
                font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
                font-size: 14px;
                line-height: 1.42857143;
                color: #333;
              
            }
            footer {
                padding-top:10px;
                width:100%;
                top: 120%;
                height:60px;
                position:absolute;
                bottom:0;
                border-top: solid 5px #FAAF3A;
            }
     </style>
</head>

<body style="background-color:#012C56;">
    <?php if(isset($_SESSION['mensaje']) ) { ?>
        <script>alert("<?php echo $_SESSION['mensaje'];?>");</script>
        <?php  
        unset($_SESSION['mensaje']);
         }
        ?>
<center>
    <div id="container" class="container">
        <form id="login_form"  action="<?php echo $helper->url("usuarios", "cambiarPwd"); ?>" method="post" onsubmit="return validapwd()">
      <br>
   <div class="field_container">
        <label>Ingrese nueva password : </label> <br>
        <input type="Password" id="pwd" name="pwd" autofocus="" placeholder="Password" required> <br>
    </div>
    
       <br>
    <div class="field_container">
      <label>Repita la nueva password :</label><br>
      <input type="Password" id="pwd2" name="pwd2" placeholder="Repite Password" required> <br>
      
    </div>
       <br>
      
    <div class="field_container">
      <label>Password actual :</label><br>
      <input type="Password" id="pwdactual" name="pwdactual" placeholder="Actual Password" required> <br>
      
    </div>
     <div class="field_container">
         
       <!--  <label><?php echo "<font color=red><b>{$error}</b></font>"; ?></label> -->
      
    </div> 
       <div id="capa" class="field_container">
           
       </div>  
    <div  class="field_container">
        <center>
            <br>
            <button id="sign_in_button" style='width:70px; height:25px'> 
            <span class="button_text">CAMBIAR</span>
            </button>
            <br>
            <br>
        </div>
            
        </div>
        </center>
    </div>
  </form>
  
</center> 
</body>
  <footer><center><img src="view/img/logo.png" alt="Duoc Uc"/><center></footer>
</html>
