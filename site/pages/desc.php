 <html lang=”pt-br”>
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
		color: white;
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

	h1 {
		color: #fdb523;
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
    
  </button><a class="navbar-brand mr-auto" href="/eachphp/index.php"><img src="/eachphp/site/resources/logo.png" width="110px"></a>
	<div class="collapse navbar-collapse justify-content-between" id="navbarTogglerDemo01">
 
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="/eachphp/index.php">Produtos<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/eachphp/site/pages/sobre.html">Sobre</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/eachphp/site/pages/login.html">Entrar</a>
      </li>
    </ul>
  </div>
</nav>
<br><br>
<?php
	$link = mysqli_connect("localhost", "root", "", "coolsunday");

	if($link === false){
    die("Um erro interno inesperado aconteceu. " . mysqli_connect_error());
	}

	mysqli_set_charset($link,"utf8"); 

	$id = mysqli_real_escape_string($link, $_REQUEST['id']);
	
	$sql = mysqli_query($link, "SELECT * FROM produtos WHERE id=$id;");
	$dados = mysqli_fetch_array($sql);
	
	echo("<center>
	<h1>Nome:</h1>
	<h3>{$dados['Nome']}</h3><br>

	<h1>Preço:</h1>
	<h3>R$ {$dados['Preco']}</h3><br>

	<h1>Descrição:</h1><br>
	<h3>{$dados['Descricao']}</h3><br>
</center>


	");

?>