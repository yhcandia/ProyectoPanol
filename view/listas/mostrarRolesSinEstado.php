<?php
    require ("conectar.php");	
            $consMat = "select * from rol";
            $roles = mysqli_query ($con,$consMat);
            return $roles;
?>

