
<html>
<head>
<title>Autentica��o</title>

<script type='text/javascript'>
function loginsucessfully(){

	window.open('../../index.php', '_parent'); 
}




function loginfailed(){
	alert('Usu�rio os senhas inv�lidos');
window.open('login.html', '_parent'); 
}
//setTimeout('window.location='../index.html'',5000);
</script>



</head>
<body>



<?php

$db = new mysqli("localhost", "root","", "coolsunday") or die (mysqli_error($db));

session_start();

$login = $_POST['uname'];
$senha = md5($_POST['psw']);	 

	$sql = mysqli_query( $db, "SELECT * FROM vendedor WHERE usuario = '$login' AND senha = '$senha'") or die (mysql_error());
	$dados = mysqli_fetch_array($sql);
	$linha = mysqli_num_rows($sql);

				
	if($linha >0){
		$_SESSION['login'] = $login;
		$_SESSION['senha'] = $senha;	
    	$_SESSION['nome'] = $dados['nome'];	
    	$_SESSION['color'] = $dados['cor'];
    	$_SESSION['photo'] = $dados['foto'];
    	$_SESSION['local'] = $dados['local'];
    	
		
echo "<script>loginsucessfully()</script>";
		echo "Voc� foi autenticado com sucesso! Aguarde um instante...";
	
		
		 
	}else{
	echo "Login ou senha inv�lidos! Aguarde um instante...";
		echo"<script>loginfailed()</script>";
	}
	
	  
	?>
	

</body>
</html>
