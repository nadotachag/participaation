<?php
session_start();
if(
	!isset ($_SESSION['num_volontaire'])
	)
	{
	echo '<script>window.location="index.php"</script>';
	}
?>
