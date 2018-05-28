<html lang="en">
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
		background-image: url("site/resources/bg.jpg");
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
<nav class="navbar navbar-expand-lg navbar-dark">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    
  </button><a class="navbar-brand mr-auto" href="#"><img src="site/resources/logo.png" width="110px"></a>
  
  <div class="collapse navbar-collapse justify-content-between" id="navbarTogglerDemo01">
 
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Produtos<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="site/pages/sobre.html">Sobre</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="site/pages/login.html">Entrar</a>
      </li>
    </ul>
  </div>
</nav>
	<h1 style="color: white; font-family: 'Do Hyeon', sans-serif" align=left>
		<span style="display:block; height: 30px;"> &emsp; Novo produto: <a style="margin-top: 10px;" href="/eachphp/site/pages/cad_produtos.php" class="btn btn-primary">+</a></span>
	</h1>
<div class="container">
	<div class="row">

		<?php
		
		function renderCards() {

			$conn = new mysqli("localhost", "root", "", "coolsunday"); //Conexão com banco de dados estabelecida.
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
							<img src=\"site/pages/produtos/{$dados['id']}\" class=\"img-fluid\" width=\"110px\">
								
							<div class=\"card-text\">
								<span style=\"color: green; font-weight: bold;\">Preço: </span> R$ {$dados['Preco']}<br>
								<span style=\"color: red; font-weight: bold;\">Vendedor: </span>{$dados['Vendedor']}
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
