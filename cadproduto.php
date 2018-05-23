<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Record Form</title>
</head>
<body>
<form action="insert.php" method="post" accept-charset="UTF-8">
    <p>
        <label for="nome">Nome do produto:</label>
        <input type="text" name="nome" id="nome">
    </p>
    <p>
        <label for="preco">Preço: R$</label>
        <input type="text" name="preco" id="preco">
    </p>
    <p>
        <label for="desc">Descrição rápida:</label><br>
        <textarea rows="4" cols="50" type="text" name="desc" id="desc" accept-charset="UTF-8"></textarea> 
    </p>
    <input type="submit" value="Submit">
</form>
</body>
</html>