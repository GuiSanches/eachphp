<?php
	if (!isset($_SESSION)){
	
		session_start();     
	
		    if (isset($_SESSION['login'])) {
		    	$login = $_SESSION['nome'];
		    }
      }

 ?>

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