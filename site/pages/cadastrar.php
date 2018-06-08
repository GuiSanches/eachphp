<?php

$conn = new mysqli("localhost", "root", "", "coolsunday");

$nome = $_POST['uname'];
$usuario = $_POST['user'];
$senha = md5($_POST['psw']);
$cor = $_POST['color'];
//$senha2 = $_POST['psw-repeat'];

//$sql_email_check = mysqli_query($conn,"SELECT COUNT(id) FROM vendedor WHERE email='{$usuario}'");
$sql_usuario_check = mysqli_query($conn,"SELECT COUNT(id) FROM vendedor WHERE usuario='{$usuario}'");

	//$eReg = mysqli_fetch_array($sql_email_check);
	$uReg = mysqli_fetch_array($sql_usuario_check);

	//$email_check = $eReg[0];
	$usuario_check = $uReg[0];
	
	if ($usuario_check > 0){

		echo "<script> alert(' Por favor corrija os seguintes erros abaixo:                                     ";		
	/*	if ($email_check > 0){		  
		 echo "O email (".$email.") já está sendo utilizado. Por favor utilize outra conta de email!                                                        ";    unset($email);	}*/

	if ($usuario_check > 0){	echo "O nome de usuario (".$usuario.") já está sendo utilizado. Por favor utilize outro nome de usuário!');
function voltar(){
setTimeout(function() {window.open('cadastro.html', '_parent')}, 2000); 
}
voltar();
	</script>";		unset($usuario);}
		echo "<br/>";
		
}else{		

$sql = mysqli_query($conn, "INSERT INTO vendedor values (default,'$usuario','$senha','$nome','$cor');");

if ($sql) { 
			echo"

<script language= 'JavaScript'> 

alert('Cadastrado com sucesso!');

function registersucessfully(){
	window.open('login.html', '_parent'); 
}

registersucessfully();

</script>";

} else { 
echo "Falha ao cadastrar.".mysql_error();
}
}
?>