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
}

.img-fluid {  /* 50% 50% centers image in div */
  width: 100px;
  height: 100px;
}

</style>
<nav class="navbar navbar-expand-lg navbar-dark">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  <a class="navbar-brand mr-auto" href="#"><img src="../resources/logo.png" width="110px" align="center"></a>
  
  <div class="collapse navbar-collapse justify-content-between" id="navbarTogglerDemo01">
 
   
  </div>
</nav>
<?php

$link = mysqli_connect("localhost", "root", "", "coolsunday");

if($link === false){
    die("Um erro interno inesperado aconteceu. " . mysqli_connect_error());
}
mysqli_set_charset($link,"utf8"); 

$nome = mysqli_real_escape_string($link, $_REQUEST['nome']);
$preco = mysqli_real_escape_string($link, $_REQUEST['preco']);
$desc = mysqli_real_escape_string($link, $_REQUEST['desc']);


$sql = "insert into produtos (id, Nome, Preco, Vendedor, Descricao) values (default, '$nome', '$preco', \"Wilson\", '$desc');";
if(mysqli_query($link, $sql)){
    echo "<br><br><center><h1>Adicionado!</h1></center>";
} else{
    echo "Alguma entrada incorreta foi inserida. Tente novamente mais tarde. " . mysqli_error($link);
}

mysqli_close($link);
?>
<br><br>
<center><a style="margin-top: 10px;" href="/eachphp/index.php" class="btn btn-primary"><h3>Voltar para o início</h3></a></center>