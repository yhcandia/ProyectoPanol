<html>
	<?php
        require ("conectar.php");	
		$consMat = "select * from proveedor";
		$materiales = mysqli_query ($con,$consMat);
		return $materiales;
	?>
</html>
