 <html lang=”pt-br”>
 <?php
	if (!isset($_SESSION)){
	
		session_start();     
	
		    if (isset($_SESSION['login'])) {
		    	$login = $_SESSION['nome'];
		    }
      }

 ?>
 <meta charset=”UTF-8”>
 <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
 <html lang=”pt-br”>
 <meta charset=”UTF-8”>
 <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
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
		background-image: url("../resources/bg.jpg");
		color: black;
	}

	.card{
		background-color: #E0E0E0;
		
	}

	.row{
  		margin-top: 30px;
	}

	.card-text {
		margin-bottom: 110px;
		font-size: 170%;
	}

	.card-title {
		background-color: #fdb523;
	}

	.card-title-text {
		font-family: 'Do Hyeon', sans-serif;
	}

}

.img-fluid {  /* 50% 50% centers image in div */
  width: 100px;
  height: 100px;
  margin-top: 100px;
}

h1 {
	color: white;
	margin-bottom: -10px;
}

h5 {
	color: white;
	margin-bottom: 20px;
}

</style>
<nav class="navbar navbar-expand-lg navbar-dark">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    
  </button><a class="navbar-brand mr-auto" href="#"><img src="/eachphp/site/resources/logo.png" width="110px"></a>
  
  <div class="collapse navbar-collapse justify-content-between" id="navbarTogglerDemo01">
 
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="/eachphp/index.php">Produtos<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/eachphp/site/pages/sobre.php">Sobre</a>
      </li>
      <li class="nav-item">
		<?php 
		if (isset($_SESSION['login'])) {
			echo("<a class=\"nav-link\" href=\"#\">{$login}</a>");
			echo("<li class=\"nav-item\">
        			<a class=\"nav-link\" href=\"/eachphp/site/pages/logout.php\">Sair</a>
      			</li></li>");
		} else {
			echo("<a class=\"nav-link\" href=\"/eachphp/site/pages/login.html\">Entrar</a></li>");
		}
		?>
    </ul>
  </div>
</nav>
<br>

<?php
	$link = mysqli_connect("localhost", "root", "", "coolsunday");

	if($link === false){
    die("Um erro interno inesperado aconteceu. " . mysqli_connect_error());
	}

	mysqli_set_charset($link,"utf8"); 

	$id = mysqli_real_escape_string($link, $_REQUEST['id']);
	
	$sql = mysqli_query($link, "SELECT * FROM produtos WHERE id=$id;");
	$dados = mysqli_fetch_array($sql);
	echo("<center><div class=\"col-md-8 col-sm-8 p-3\">
					<div class=\"card text-center\" > 
						<div class=\"card-block box shadow\" >
							<div class=\"card-title\"> 
								<h1 class=\"card-title-text\">{$dados['Nome']}<h5>(de {$dados['Vendedor']})</h5></h1>
							</div>
							<img src=\"/eachphp/site/pages/produtos/{$dados['id']}\" class=\"img-fluid\" style=\"width: 30%;\">
								
							<div class=\"card-text\">
								
								<span style=\"color: #fdb523; font-weight: bold;\">Descrição rápida: </span><br>{$dados['Descricao']}<br><br>
								<span style=\"color: green; font-weight: bold;\">Preço: </span> R$ {$dados['Preco']}<br>
								<span style=\"color: blue; font-weight: bold;\">Local: </span><br>
								<span style=\"color: red; font-weight: bold;\">Vendedor: </span>{$dados['Vendedor']}
								<br><br>
							</div>
						</div>
					</div>
				</div>
				</center>");
?>

