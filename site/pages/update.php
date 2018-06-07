<?php

$login = false;
	if (!isset($_SESSION)){
		session_start();     
	
		    if (isset($_SESSION['login'])) {
		    	$login = $_SESSION['nome'];
		    } 
      }


$link = mysqli_connect("localhost", "root", "", "coolsunday");
mysqli_set_charset($link,"utf8"); 
$prodId = mysqli_real_escape_string($link, $_REQUEST['prodId']); 

if($link === false){
    die("Um erro interno inesperado aconteceu. " . mysqli_connect_error());
}
mysqli_set_charset($link,"utf8"); 


	$nome = $_POST['nome'];
	$preco = $_POST['preco'];
	$desc = $_POST['desc'];
	$vendedor = $_SESSION['login'];

	$sql = "UPDATE produtos SET Nome = '$nome', Preco = '$preco', Descricao='$desc' WHERE id='{$prodId}'";

	if(mysqli_query($link, $sql)){

		$sql = mysqli_query($link,"SELECT * FROM produtos WHERE id='{$prodId}' ORDER BY id DESC LIMIT 0, 1") or die (mysqli_error($link));
		$dados = mysqli_fetch_array($sql);
		$target = "produtos/".$prodId.".jpg";

         if(isset($_FILES['image']['tmp_name'])){
         	unlink($target);    //deleteimg
         	move_uploaded_file($_FILES['image']['tmp_name'], $target);
         }
		

	    	echo"
<script language= 'JavaScript'> 

alert('Informações atualizadas! Suas alterações agora aguardam aprovação por um administrador');

function registersucessfully(){
setTimeout(function() {window.open('/eachphp/site/pages/productsby.php?vend={$_SESSION['login']}', '_parent')}, 0); 
}

registersucessfully();

</script>";
	} else{
	    	echo"
<script language= 'JavaScript'> 

alert('Aconteceu algum erro! : /');

function registerfail(){
setTimeout(function() {window.open('/eachphp/site/pages/productsby.php?vend={$_SESSION['login']}', '_parent')}, 0); 
}

registersfail();

</script>" . mysqli_error($link);
	    mysqli_close($link);
	}



?>