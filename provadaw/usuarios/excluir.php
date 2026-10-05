<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
$cpf = $_POST["cpf"];
if(file_exists("usuarios.txt")) {
$arqExcluir = fopen("usuarios.txt", "r");
$novo = "";
while(($linha = fgets($arqExcluir)) !== false) {
if(trim($linha) != "") {
$excluir = explode(";", trim($linha));
if($excluir[1] != $cpf) {
$novo .= $linha;
}
}
}
fclose($arqExcluir);
$arqUsuarios = fopen("usuarios.txt", "w");
fwrite($arqUsuarios, $novo);
fclose($arqUsuarios);
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Excluir Usuario</title>
</head>
<body>
<h1>Excluir Usuario</h1>
<form action="excluir_usuario.php" method="POST">
CPF do usuario: <input type="text" name="cpf"><br>
<br><input type="submit" value="Excluir">
</form>
<br><a href="criar_usuario.php">Voltando</a>
</body>
</html>
