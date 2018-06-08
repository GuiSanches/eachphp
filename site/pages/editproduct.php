<html lang="en">
<?php
	$login = false;
	if (!isset($_SESSION)){
		session_start();     
	
		    if (isset($_SESSION['login'])) {
		    	$login = $_SESSION['nome'];
		    } 
      }
 ?>
<head>
  <title>COMIDINHAS - EACH USP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="/eachphp/site/pages/css/editproduct.css">
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
			mysqli_set_charset($conn,"utf8"); 
		    $prodId = mysqli_real_escape_string($conn, $_REQUEST['prodId']); 

		
				$sql = mysqli_query($conn,"SELECT * FROM produtos WHERE id=$prodId") or die (mysqli_error($conn)); //Começa as putaria.
				$dados = mysqli_fetch_array($sql);

				if ($dados['Usuario'] == $_SESSION['login']) {
						
					echo("<center>
								<div class=\"col-md-5 col-sm-8 p-3\">
					<div class=\"card text-center\" > 
						<div class=\"card-block box shadow\" >
							<div class=\"card-title\"> 
								<h1 class=\"card-title-text\"> Alterar informações</h1><br>
							</div>
							<form class='form' method='POST' action='/eachphp/site/pages/update.php?prodId=$prodId' accept-charset='UTF-8' enctype='multipart/form-data'>
							<img src=\"produtos/{$dados['id']}.jpg\" class=\"img-fluid\" style=\"width: 30%;\"><br>
								 Alterar Imagem:
							<br> <input type='file' name='image'/>		<br>
							<div class=\"card-text\">
								Título do anúncio<input type='text' name='nome' value='{$dados['Nome']}' /><br>
								
								Descrição rápida: <input type='text' name='desc' value='{$dados['Descricao']}' /><br>
							Preço: <br><input type='text' name='preco' value='{$dados['Preco']}' />  <br>
								Local: <br><input type='text' value='ainda nao tem'/>  <br>
						     Vendedor: </span>{$dados['Vendedor']}<br>
								

								<a style=\"margin-top: 10px;\" href=\"/eachphp/site/pages/productsby.php?vend={$login}\" name=\"id\" id=\"id\" class=\"btn btn-primary\"><span style=\"font-size: 20px;\">Voltar</span></a>

								<button class='btn btn-primary' style=\"font-size: 20px; margin-bottom:-10px;\" type='submit'>Salvar</button>
								</form>
								<br><br>
							</div>
						</div>
					</div>
				</div>
				
				</center>");
				} 
				
			
?>





</body>
</html>
