
<html>
<head>
<title>Autentica��o</title>

<script type='text/javascript'>
function loginsucessfully(){

setTimeout(function() {window.open('../../index.php', '_parent')}, 5000); 
}

function loginfailed(){
setTimeout(function() {window.open('login.html', '_parent')}, 6000); 

}
//setTimeout('window.location='../index.html'',5000);
</script>



</head>
<body>



<?php

$db = new mysqli("localhost", "root","", "coolsunday") or die (mysqli_error($db));

session_start();

$login = $_POST['uname'];
$senha = $_POST['psw'];	 

	$sql = mysqli_query( $db, "SELECT * FROM vendedor WHERE usuario = '$login' AND senha = '$senha'") or die (mysql_error());
	$dados = mysqli_fetch_array($sql);
	$linha = mysqli_num_rows($sql);

				
	if($linha >0){
		$_SESSION['login'] = $login;
		$_SESSION['senha'] = $senha;	
    	$_SESSION['nome'] = $dados['nome'];	
		
echo "<script>loginsucessfully()</script>";
		echo "Voc� foi autenticado com sucesso! Aguarde um instante...";
	
		
		 
	}else{
	echo "Login ou senha inv�lidos! Aguarde um instante...";
		echo"<script>loginfailed()</script>";
	}
	
	  
	?>
	

</body>
</html>
