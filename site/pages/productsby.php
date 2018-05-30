﻿<html lang="en">
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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<style>
	
	@import url('https://fonts.googleapis.com/css?family=Do+Hyeon');
	

	.navbar-dark {
		background-color: #fdb523;
		font-family: 'Do Hyeon', sans-serif;
		color: green;
		font-size: 25px;
	}


	body {
		background-image: url("/eachphp/site/resources/bg.jpg");
	}

	.card{
		background-color: #E0E0E0;
		max-height: 250px;
		min-height: 250px;
	}

	.row{
  		margin-top: 30px;
	}

	.card-text {
		margin-bottom: 50px;
		max-height: 110px;
		min-height: 110px;
	}

	.card-title {
		background-color: #fdb523;
	}

	.card-title-text {
		font-family: 'Do Hyeon', sans-serif;
	}

	.shadow {
  box-shadow: 0px 2px 4px -1px rgba(0, 0, 0, 0.2), 0px 4px 5px 0px rgba(0, 0, 0, 0.14), 0px 1px 10px 0px rgba(0, 0, 0, 0.12);
  transition: box-shadow 0.28s cubic-bezier(0.4, 0, 0.2, 1);
  &:hover {
    box-shadow: 0px 11px 15px -7px rgba(0, 0, 0, 0.2), 0px 24px 38px 3px rgba(0, 0, 0, 0.14), 0px 9px 46px 8px rgba(0, 0, 0, 0.12);
  }


  
}


.img-fluid {  /* 50% 50% centers image in div */
  width: 100px;
  height: 100px;
}

</style>
<div id="nav-placeholder"> </div>
	<script>
	$(function(){
	  $("#nav-placeholder").load("/eachphp/site/resources/nav.php");
	});
	</script>
<br>
<?php 
	$conn = new mysqli("localhost", "root", "", "coolsunday"); //Conexão com banco de dados estabelecida.
	$vend = mysqli_real_escape_string($conn, $_REQUEST['vend']); ?>
<br>
<h3 style="color: white; font-family: 'Do Hyeon', sans-serif" align=left><span style="display:block; height: 30px;">&emsp;&emsp;Produtos por: <?php echo("{$vend}")?></span></h3>


<div class="container">
	<div class="row">

		<?php

			$conn = new mysqli("localhost", "root", "", "coolsunday"); //Conexão com banco de dados estabelecida.
			$sql = mysqli_query($conn,"SELECT * FROM produtos ORDER BY id DESC LIMIT 0, 1") or die (mysqli_error($conn)); //Seleciona todas as informações sobre o produto com o maior ID.
			mysqli_set_charset($conn,"utf8"); 
			$dados = mysqli_fetch_array($sql); //Armazena todas as linhas do produto com o maior ID.
			$linha =  $dados['id'];
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
							<img src=\"/eachphp/site/pages/produtos/{$dados['id']}.jpg\" class=\"img-fluid\" width=\"110px\">
								
							<div class=\"card-text\">
								<span style=\"color: green; font-weight: bold;\">Preço: </span> R$ {$dados['Preco']}<br>
								<span style=\"color: red; font-weight: bold;\">Vendedor: </span><a href=\"/eachphp/site/pages/productsby.php?vend={$dados['Vendedor']}\">{$dados['Vendedor']}</a>
								<br>
								<form action=\"/eachphp/site/pages/desc.php\" method=\"post\">
									<a style=\"margin-top: 10px;\" href=\"/eachphp/site/pages/desc.php?id={$dados['id']}\" name=\"id\" id=\"id\" class=\"btn btn-primary\">Ver mais</a>
								</form>
							</div>
						</div>
					</div>
				</div>");
				} else if ($dados != null && $dados['Aprovado'] == true && $dados['Vendedor'] == $vend && $dados['Vendedor'] == $_SESSION['nome']) {
						
					echo("<div class=\"col-md-3 col-sm-6 p-3\">
					<div class=\"card text-center\" > 
						<div class=\"card-block box shadow\" >
							<div class=\"card-title\"> 
								<h4 class=\"card-title-text\">{$dados['Nome']}</h4>
							</div>
							<img src=\"/eachphp/site/pages/produtos/{$dados['id']}.jpg\" class=\"img-fluid\" width=\"110px\">
								
							<div class=\"card-text\">
<span style=\"color: green; font-weight: bold;\">Preço: </span> R$ {$dados['Preco']}<br>
								<form action=\"/eachphp/site/pages/desc.php\" method=\"post\">
									<a style=\"margin-top: 10px;\" href=\"/eachphp/site/pages/desc.php?id={$dados['id']}\" name=\"id\" id=\"id\" class=\"btn btn-primary\">Editar</a>
									<a style=\"margin-top: 10px;\" href=\"/eachphp/site/pages/delete.php?id={$dados['id']}&vend={$dados['Vendedor']}\" name=\"id\" id=\"id\" class=\"btn btn-danger\">Deletar</a>
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
