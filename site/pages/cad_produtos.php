 <html lang=”pt-br”>
<?php
	if (!isset($_SESSION)){
	
		session_start();     
	
		    if (isset($_SESSION['login'])) {
		    	$login = $_SESSION['login'];
		    }
      }

 ?>
 <meta charset=”UTF-8”>
 <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
<head>
  <title>COMIDINHAS - EACH USP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="css/cad_produtos.css">
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
	$vendedor = $_SESSION['nome'];

	$sql = "insert into produtos (id, Nome, Preco, Vendedor, Descricao, Aprovado) values (default, '$nome', '$preco', '$vendedor', '$desc',1);";

	if(mysqli_query($link, $sql)){

		$sql = mysqli_query($link,"SELECT * FROM produtos ORDER BY id DESC LIMIT 0, 1") or die (mysqli_error($link));
		$dados = mysqli_fetch_array($sql);
		$target = "produtos/".$dados['id'].".jpg";

		move_uploaded_file($_FILES['image']['tmp_name'], $target);
	    
	    echo ("<br><br><center><h1 style=\"color: white;\">Adicionado!</h1></center><br>
	    	<center><a style=\"margin-top: 10px;\" href=\"../../index.php\" class=\"btn btn-primary\"><h3>Voltar para o início</h3></a></center>");
	} else{
	    echo "Alguma entrada incorreta foi inserida. Tente novamente mais tarde. " . mysqli_error($link);
	}
	mysqli_close($link);
} else {
	if (isset($_SESSION['login'])) {

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
									<a style="margin-top: 10px;" href="../../index.php" class="btn btn-primary">Voltar</a><br><br>		
							</div>
						</div>
					</div>
				</div>
				<br>
</center>
<?php
		} else {
			echo ("<br><br><center><h1 style=\"color: white;\">Inicie sessão para prosseguir!</h1></center><br>
	    	<center><a style=\"margin-top: 10px;\" href=\"login.html\" class=\"btn btn-primary\"><h3>Iniciar sessão</h3></a></center>");
		} 
	} //fim do else, para sumir com todo o html quando o submit for acionado.
?>
</body>
</html>
