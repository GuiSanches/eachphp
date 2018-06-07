<html>
<head>
<title>Autenticação</title>

<script type='text/javascript'>
function desconectar(){
setTimeout(function() {window.open('/eachphp/index.php', '_parent')}, 1000); 
}
</script>
</head>
<body>
<?php
    if (!isset($_SESSION)) session_start();
        session_destroy();
		echo "Redirecionando... <script>desconectar()</script>"; exit;
  
    ?>
	
	
</body>
</html>