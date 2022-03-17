<?php
session_start();

if (
	isset($_SESSION['num_volontaire'])
	)
{
	session_destroy();
	?>
        <script>
        window.location.href = "index.php";
        </script>
        <?php
}
?>
