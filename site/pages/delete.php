<?php
	if (!isset($_SESSION)){
		session_start();     
     }
      	require '../resources/config.php';
		$conn = mysqli_connect($host, $user, $password, $bd);

		$id = mysqli_real_escape_string($conn, $_REQUEST['id']);
		$vend = mysqli_real_escape_string($conn, $_REQUEST['vend']);

     if ($_SESSION['login'] == $vend) {
		mysqli_query($conn,"DELETE FROM produtos WHERE id={$id}");
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
?>