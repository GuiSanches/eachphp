<html lang="en">
<?php
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
 <link rel="stylesheet" type="text/css" href="site/pages/css/index.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>

<div id="nav-placeholder"> </div>
	<script>
	$(function(){
	  $("#nav-placeholder").load("site/resources/nav.php");
	});
	</script>
<br>
<?php 

if (isset($_SESSION['login'])) {
	echo("<h1 style=\"color: white; font-family: 'Do Hyeon', sans-serif\" align=left>
				<span style=\"display:block; height: 30px;\">&nbsp;&nbsp;<a style=\"margin-top: 10px; font-size: 25px;;\" href=\"site/pages/cad_produtos.php\" class=\"btn btn-primary\">Adicionar produto!</a></span>
			</h1><br>");
	} else {
		echo("<h3 style=\"color: white; font-family: 'Do Hyeon', sans-serif\" align=left>
				<span style=\"display:block; height: 30px;\">&emsp;&emsp;Dica: Inicie sessão para adicionar seu produto!</span>
			</h3>");
	}

?>

<div class="container">
	<div class="row">

		<?php
		function renderCards() {
			require 'site/resources/config.php';
			$conn = new mysqli($host, $user, $password, $bd); //Conexão com banco de dados estabelecida.
			$sql = mysqli_query($conn,"SELECT * FROM produtos ORDER BY id DESC LIMIT 0, 1") or die (mysqli_error($conn)); //Seleciona todas as informações sobre o produto com o maior ID.
			mysqli_set_charset($conn,"utf8"); 
			$dados = mysqli_fetch_array($sql); //Armazena todas as linhas do produto com o maior ID.
			$linha =  $dados['id'];

			while ($linha>0) {
				$sql = mysqli_query($conn,"SELECT * FROM produtos WHERE id=$linha") or die (mysqli_error($conn)); //Começa as putaria.
				$dados = mysqli_fetch_array($sql);

				
				if ($dados != null && $dados['Aprovado'] == true) {
						
					echo("<div class=\"col-md-3 col-sm-6 p-3\">
					<div class=\"card text-center\" > 
						<div class=\"card-block box shadow\" >
							<div class=\"card-title\"> 
								<h4 class=\"card-title-text\">{$dados['Nome']}</h4>
							</div>
							<img src=\"site/pages/produtos/{$dados['id']}.jpg\" class=\"img-fluid\" width=\"110px\">
								
							<div class=\"card-text\">
								<span style=\"color: green; font-weight: bold;\">Preço: </span> R$ {$dados['Preco']}<br>
								<span style=\"color: red; font-weight: bold;\">Vendedor: </span><a href=\"site/pages/productsby.php?vend={$dados['Usuario']}\">{$dados['Vendedor']}</a>
								<br>
								<form action=\"site/pages/desc.php\" method=\"post\">
									<a style=\"margin-top: 10px;\" href=\"site/pages/desc.php?id={$dados['id']}\" name=\"id\" id=\"id\" class=\"btn btn-primary\">Ver mais</a>
								</form>
							</div>
						</div>
					</div>
				</div>");
					
				}
				$linha--;
			}
		}

		renderCards(); //Essa invocação de método não deveria existir mas ela não machuca ninguém eu juro.
		?>
		
	</div>
</div>



</body>
</html>
