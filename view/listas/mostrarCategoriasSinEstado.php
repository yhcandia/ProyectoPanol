<html>
	<?php
        require ("conectar.php");	
		$consMat = "select * from categoria";
		$categorias = mysqli_query ($con,$consMat);
		return $categorias;
	?>
</html>