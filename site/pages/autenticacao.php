
<html>
<head>
<title>Autenticação</title>

<script type='text/javascript'>
function loginsucessfully(){

	window.open('../../index.php', '_parent'); 
}




function loginfailed(){
	alert('Usuário os senhas inválidos');
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
		echo "Você foi autenticado com sucesso! Aguarde um instante...";
	
		
		 
	}else{
	echo "Login ou senha inválidos! Aguarde um instante...";
		echo"<script>loginfailed()</script>";
	}
	
	  
	?>
	

</body>
</html>
