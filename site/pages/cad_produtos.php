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

	.card-title {
		background-color: #fdb523;
	}

	.card-title-text {
		font-family: 'Do Hyeon', sans-serif;
		font-size: 32px;
	}
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
	
<br>
<br>

<?php

$link = mysqli_connect("localhost", "root", "", "coolsunday");

if($link === false){
    die("Um erro interno inesperado aconteceu. " . mysqli_connect_error());
}
mysqli_set_charset($link,"utf8"); 
if (isset($_POST['submit'])) {
	$nome = mysqli_real_escape_string($link, $_REQUEST['nome']);
	$preco = mysqli_real_escape_string($link, $_REQUEST['preco']);
	$desc = mysqli_real_escape_string($link, $_REQUEST['desc']);

	$sql = "insert into produtos (id, Nome, Preco, Vendedor, Descricao, Aprovado) values (default, '$nome', '$preco', \"Wilson\", '$desc',1);";

	if(mysqli_query($link, $sql)){

		$sql = mysqli_query($link,"SELECT * FROM produtos ORDER BY id DESC LIMIT 0, 1") or die (mysqli_error($link));
		$dados = mysqli_fetch_array($sql);
		$target = "produtos/".$dados['id'].".jpg";

		move_uploaded_file($_FILES['image']['tmp_name'], $target);
	    
	    echo ("<br><br><center><h1 style=\"color: white;\">Adicionado!</h1></center><br>
	    	<center><a style=\"margin-top: 10px;\" href=\"/eachphp/index.php\" class=\"btn btn-primary\"><h3>Voltar para o início</h3></a></center>");
	} else{
	    echo "Alguma entrada incorreta foi inserida. Tente novamente mais tarde. " . mysqli_error($link);
	}
	mysqli_close($link);
} else {

?>

<center>
	<div class="col-md-5 col-sm-6 p-8">
					<div class="card text-center" > 
						<div class="card-block box shadow" >
							<div class="card-title"> 
								<h4 class="card-title-text">Cadastrar produto!</h4>
							</div>
							<div class="card-text">
								<form action="cad_produtos.php" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
									    <p>
									        <label for="nome">Nome do produto:</label><br>
									        <input type="text" name="nome" id="nome">
									    </p>
									    
									    <p>
									        <label for="preco">Preço: R$</label><br>
									        <input type="text" name="preco" id="preco"><br>
									        <p style="font-size: 12px; color: red;">Nota: Insira "." (ponto) ao invés de "," (vírgula).</p>
									    </p>   
									    <p>
									        <label for="desc">Descrição rápida:</label><br>
									        <textarea rows="4" cols="50" type="text" name="desc" id="desc" accept-charset="UTF-8"></textarea> 
									    </p>
									    Upload de imagem:<br><br>
									    <input type="hidden" name="size" value="1000000">
									    <div>
									      <input type="file" name="image">
									    </div>
									    <br>
									    <input type="submit" value="Enviar" name="submit" id="submit">
								</form>
									<a style="margin-top: 10px;" href="/eachphp/index.php" class="btn btn-primary">Voltar</a><br><br>		
							</div>
						</div>
					</div>
				</div>
				<br>
</center>
<?php 
} //fim do else, para sumir com todo o html quando o submit for acionado.
?>
</body>
</html>
