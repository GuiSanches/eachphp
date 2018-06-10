<?php
  $color = "#fdb523";
	if (!isset($_SESSION)){
		session_start();     
		    if (isset($_SESSION['login'])) {
		    	$login = $_SESSION['nome'];
          if ($_SESSION['color'] != "#ffffff") {
            $color = $_SESSION['color'];
          }
          
		    }
      }
      require 'config.php';
 ?>



 <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: <?php echo($color) ?> !important;">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"   rel="stylesheet">
<link href=<?php echo "\"{$root}site/pages/css/nav.css\"" ?>   rel="stylesheet">
  <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    
  </button><a class="navbar-brand mr-auto" href=<?php echo "\"{$root}index.php\"" ?>><img src=<?php echo "\"{$root}/site/resources/logo.png\"" ?> width="110px"></a>
  
  <div class="collapse navbar-collapse justify-content-between" id="navbarTogglerDemo01">
 
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href=<?php echo "\"{$root}index.php\"" ?>>Produtos<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href=<?php echo "\"{$root}site/pages/sobre.php\"" ?>>Sobre</a>
      </li>
      <li class="nav-item">
		<?php 
		if (isset($_SESSION['login'])) {
			

     $usericon="{$root}site/resources/perfil/{$_SESSION['photo']}";
		

			echo("<li class=\"nav-item\"><a class=\"nav-link\" >{$login}</a></li>");
			echo( "<a class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\" href=\"site/pages/login.html\" >
				<img src={$usericon} class=\"icologin\"/></a>
<div class=\"dropdown-menu dropdown-menu-right\">
    <a class=\"dropdown-item\" href=\"{$root}site/pages/myinfo.php\">Meus dados</a>
    <a class=\"dropdown-item\" href=\"{$root}site/pages/productsby.php?vend={$_SESSION['login']}\">Meus produtos</a>
    <div class=\"dropdown-divider\"></div>
    <a class=\"dropdown-item\" href=\"{$root}site/pages/logout.php\">Sair</a>
  </div>
            </li>");
		} else {
			echo("<a class=\"nav-link\" href=\"{$root}site/pages/login.html\">Entrar</a></li>");
		}
		?>
    </ul>
  </div>
</nav>