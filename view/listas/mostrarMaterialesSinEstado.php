<html>
	<?php
        require ("conectar.php");	
		$consMat = "select * from material";
		$materiales = mysqli_query ($con,$consMat);
		return $materiales;
	?>
</html>