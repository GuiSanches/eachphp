<?php
	$login = false;
	if (!isset($_SESSION)){
		session_start();     
		    if (isset($_SESSION['login'])) {
		    	$login = $_SESSION['nome'];
		    } 
      }

      	$conn = new mysqli("localhost", "root", "", "coolsunday"); //Conexão com banco de dados estabelecida.
		$id = mysqli_real_escape_string($conn, $_REQUEST['id']);
		$vend = mysqli_real_escape_string($conn, $_REQUEST['vend']);

     if ($_SESSION['nome'] == $vend) {
		mysqli_query($conn,"DELETE FROM produtos WHERE id={$id}");
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
?>