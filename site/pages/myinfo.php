<html lang="en">
<?php
	$login = false;
	if (!isset($_SESSION)){
		session_start();     
	
		    if (isset($_SESSION['login'])) {
		    	$login = $_SESSION['nome'];
		    }else{
		    	echo"<script type='text/javascript'>
		    	window.open('../../index.php', '_parent'); 
       	</script>
    	    	";
		    }
      }
 ?>
<head>
  <title>COMIDINHAS - EACH USP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="css/myinfo.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>

<div id="nav-placeholder"> </div>
	<script>
	$(function(){
	  $("#nav-placeholder").load("../resources/nav.php");
	});
	</script>
<br>
<?php

	require '../resources/config.php';
	$conn = mysqli_connect($host, $user, $password, $bd);

		echo("<h3 style=\"color: white; font-family: 'Do Hyeon', sans-serif\" align=left><span style=\"display:block; height: 30px;\">&emsp;&emsp;Seus dados</span></h3>");


			$conn = new mysqli("localhost", "root", "", "coolsunday"); //Conexão com banco de dados estabelecida.
			$sql = mysqli_query($conn,"SELECT * FROM produtos ORDER BY id DESC LIMIT 0, 1") or die (mysqli_error($conn)); //Seleciona todas as informações sobre o produto com o maior ID.
			mysqli_set_charset($conn,"utf8"); 
			$dados = mysqli_fetch_array($sql); //Armazena todas as linhas do produto com o maior ID.
			$linha =  $dados['id'];
		
$user = $_SESSION['login'];

				$sql = mysqli_query($conn,"SELECT * FROM vendedor WHERE Usuario = '$user'") or die (mysqli_error($conn)); //Começa as putaria.
				$dados = mysqli_fetch_array($sql);

							
				echo("<center>

		

								<div class=\"col-md-5 col-sm-8 p-3\">
					<div class=\"card text-center\" > 
						<div class=\"card-block box shadow\" >
							<div class=\"card-title\"> 
								<h1 class=\"card-title-text\"> Alterar informações</h1><br>
							</div>
<form class='form' method='POST' action='/eachphp/site/pages/updateinfo.php' accept-charset='UTF-8' enctype='multipart/form-data'>

<img src=\"/eachphp/site/resources/perfil/{$_SESSION['photo']}\" class=\"img-fluid\" style=\"width: 30%;\"><br>
 Alterar Imagem:<br> 
	<input type='file' name='image' value='null'/>	<br><br>

<div class='list-group'>								
  <span class='list-group-item active'>Nome</span>
  <input class='list-group-item' type='text' name='nome' value='{$_SESSION['nome']}' />
 </div>
<br>

<div class='list-group'>								
  <span class='list-group-item active'>Usuário</span>
  <span class='list-group-item'>{$dados['Usuario']}</span>
 </div>
 <br>

<div class='list-group'>								
  <span class='list-group-item active'>Senha</span>
  <input class='list-group-item' type='password' name='psw' value='{$_SESSION['senha']}' />
 </div>
 <br>

<div class='list-group'>								
  <span class='list-group-item active'>Local de venda</span>
  <input class='list-group-item' type='text' name='local' value='{$_SESSION['local']}'/>
 </div>
 <br>

<div class='list-group'>								
  <span class='list-group-item active'>Cor do tema</span>
    <input class='colorinput' type='color' name='color' value='{$_SESSION['color']}'/>
 </div>
 <br>
  
<div class='list-group'>	
<button class='list-group-tem btn btn-success btn-lg' style=\"font-size: 20px; margin-bottom:-10px; width:100.5%; margin-left:-1px;\" type='submit'>Salvar</button>
<a style=\"margin-top: 10px; margin-bottom:-17px; width:100.5%; margin-left:-1px;\" href=\"/eachphp/index.php\" name=\"id\" id=\"id\" class=\"btn btn-danger btn-lg\"><span style=\"font-size: 20px;\">Voltar</span></a>
								</form>
</div>
							
							
							
						</div>
					</div>
				</div>
				
				</center>");			


?>

</body>
</html>