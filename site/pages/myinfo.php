<html lang="en">
<?php
	$login = false;
	if (!isset($_SESSION)){
		session_start();     
	
		    if (isset($_SESSION['login'])) {
		    	$login = $_SESSION['nome'];
<<<<<<< HEAD
		    }else{
		    	echo"<script type='text/javascript'>
		    	window.open('/eachphp/index.php', '_parent'); 
       </script>
    	    	";
		    }
=======
		    } 
>>>>>>> 3449cdfc61af783e32dcbe4c4ec4eb9ed307505b
      }
 ?>
<head>
  <title>COMIDINHAS - EACH USP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<<<<<<< HEAD
 <link rel="stylesheet" type="text/css" href="css/myinfo.css">
=======
 <link rel="stylesheet" type="text/css" href="css/productsby.css">
>>>>>>> 3449cdfc61af783e32dcbe4c4ec4eb9ed307505b
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
	$conn = new mysqli("localhost", "root", "", "coolsunday"); //Conexão com banco de dados estabelecida.
<<<<<<< HEAD



		echo("<h3 style=\"color: white; font-family: 'Do Hyeon', sans-serif\" align=left><span style=\"display:block; height: 30px;\">&emsp;&emsp;Seus dados</span></h3>");

=======
	$vend = mysqli_real_escape_string($conn, $_REQUEST['vend']); 

	if ($login != $vend) {
		echo("<h3 style=\"color: white; font-family: 'Do Hyeon', sans-serif\" align=left><span style=\"display:block; height: 30px;\">&emsp;&emsp;Produtos por: {$vend}</span></h3>");
	} else {
		echo("<h3 style=\"color: white; font-family: 'Do Hyeon', sans-serif\" align=left><span style=\"display:block; height: 30px;\">&emsp;&emsp;Meus dados</span></h3>");
	}

?>

<div class="container">
	<div class="row">

		<?php
>>>>>>> 3449cdfc61af783e32dcbe4c4ec4eb9ed307505b

			$conn = new mysqli("localhost", "root", "", "coolsunday"); //Conexão com banco de dados estabelecida.
			$sql = mysqli_query($conn,"SELECT * FROM produtos ORDER BY id DESC LIMIT 0, 1") or die (mysqli_error($conn)); //Seleciona todas as informações sobre o produto com o maior ID.
			mysqli_set_charset($conn,"utf8"); 
			$dados = mysqli_fetch_array($sql); //Armazena todas as linhas do produto com o maior ID.
			$linha =  $dados['id'];
<<<<<<< HEAD
		
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
=======
			$vend = mysqli_real_escape_string($conn, $_REQUEST['vend']);

			while ($linha>0) {
				$sql = mysqli_query($conn,"SELECT * FROM produtos WHERE id=$linha") or die (mysqli_error($conn)); //Começa as putaria.
				$dados = mysqli_fetch_array($sql);

				if ($dados != null && $dados['Aprovado'] == true && $dados['Vendedor'] == $vend && $login != $dados['Vendedor']) {
						
					echo("<div class=\"col-md-3 col-sm-6 p-3\">
					<div class=\"card text-center\" > 
						<div class=\"card-block box shadow\" >
							<div class=\"card-title\"> 
								<h4 class=\"card-title-text\">{$dados['Nome']}</h4>
							</div>
							<img src=\"produtos/{$dados['id']}.jpg\" class=\"img-fluid\" width=\"110px\">
								
							<div class=\"card-text\">
								<span style=\"color: green; font-weight: bold;\">Preço: </span> R$ {$dados['Preco']}<br>
								<span style=\"color: red; font-weight: bold;\">Vendedor: </span><a href=\"productsby.php?vend={$dados['Vendedor']}\">{$dados['Vendedor']}</a>
								<br>
								<form action=\"desc.php\" method=\"post\">
									<a style=\"margin-top: 10px;\" href=\"desc.php?id={$dados['id']}\" name=\"id\" id=\"id\" class=\"btn btn-primary\">Ver mais</a>
								</form>
							</div>
						</div>
					</div>
				</div>");
				} else if ($dados != null && $dados['Vendedor'] == $vend && $dados['Vendedor'] == $_SESSION['nome']) {
						
					echo("<div class=\"col-md-3 col-sm-6 p-3\">
					<div class=\"card text-center\" > 
						<div class=\"card-block box shadow\" >
							<div class=\"card-title\"> 
								<h4 class=\"card-title-text\">{$dados['Nome']}</h4>
							</div>
							<img src=\"produtos/{$dados['id']}.jpg\" class=\"img-fluid\" width=\"110px\">
								
							<div class=\"card-text\">
<span style=\"color: green; font-weight: bold;\">Preço: </span> R$ {$dados['Preco']}<br>
								<form action=\"desc.php\" method=\"post\">
									<a style=\"margin-top: 10px;\" href=\"desc.php?id={$dados['id']}\" name=\"id\" id=\"id\" class=\"btn btn-primary\">Editar</a>
									<a style=\"margin-top: 10px;\" href=\"delete.php?id={$dados['id']}&vend={$dados['Vendedor']}\" name=\"id\" id=\"id\" class=\"btn btn-danger\">Deletar</a>
								</form>
							</div>
						</div>
					</div>
				</div>");
				}
				$linha--;
			}
?>


		
	</div>
</div>



</body>
</html>
>>>>>>> 3449cdfc61af783e32dcbe4c4ec4eb9ed307505b
