<?php

$login = false;
	if (!isset($_SESSION)){
		session_start();     
	
		    if (isset($_SESSION['login'])) {
		    	$login = $_SESSION['nome'];
		    }else{
		    	echo"<script type='text/javascript'>
		    	window.open('../../index.php', '_parent'); 
       </script>
    	    	";
		    }
      }


require '../resources/config.php';
$link = mysqli_connect($host, $user, $password, $bd);
mysqli_set_charset($link,"utf8"); 


if($link === false){
    die("Um erro interno inesperado aconteceu. " . mysqli_connect_error());
}
mysqli_set_charset($link,"utf8"); 


	$name = $_POST['nome'];

	$theme = $_POST['color'];	
	$photo = $_SESSION['photo'];

   if (isset($_POST['psw'])){
   	$password = $_POST['psw'];	
   }else{
   	$password = $_SESSION['psw'];
   }

	if(isset($_FILES['image'])){
		$photo = $_SESSION['login'].".jpg";
	}else{
		$photo = $_SESSION['photo'];
	}

	$local = $_POST['local'];

	

	$sql ="UPDATE vendedor SET nome = '$name', senha='$password', cor='$theme', foto='$photo', local='$local' WHERE Usuario='{$_SESSION['login']}'";

	if(mysqli_query($link, $sql)){

		
if($_FILES['image']['name'] !== ""){
       
         if($photo !== $_SESSION['photo']){

if($_SESSION['photo'] !== 'logicon.png'){

         	 $target = "../resources/perfil/".$_SESSION['photo'];
         	 unlink($target);  
         	 $target = "../resources/perfil/".$photo;
         	move_uploaded_file($_FILES['image']['tmp_name'], $target);

         	}else{

   				 $target = "../resources/perfil/".$photo;
         			move_uploaded_file($_FILES['image']['tmp_name'], $target);
         	}

         }else{
          $target = "../resources/perfil/".$photo;
         	 unlink($target);  
           	move_uploaded_file($_FILES['image']['tmp_name'], $target);
         }
		}
						
		$_SESSION['senha'] = $password;	
    	$_SESSION['nome'] = $name;	
    	$_SESSION['color'] = $theme;
    	$_SESSION['photo'] = $photo;
    	$_SESSION['local'] = $local;

	    	echo"
<script language= 'JavaScript'> 

alert('Seus dados foram atualizados!');
window.open('/eachphp/site/pages/myinfo.php', '_parent');


</script>";
	} else{
	    	echo"
<script language= 'JavaScript'> 

alert('Aconteceu algum erro!');
window.open('/eachphp/site/pages/myinfo.php', '_parent');


</script>" . mysqli_error($link);
	    mysqli_close($link);
	}



?>