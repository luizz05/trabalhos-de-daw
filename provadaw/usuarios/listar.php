<?php
$listarUsuarios = "";

if(file_exists("usuarios.txt")) {
$arqUsuario = fopen("usuarios.txt", "r") or die("ERROR!! Erro ao abrir o arquivo.");
while(($linha = fgets($arqUsuario)) !== false) {
if(trim($linha) != "") {
$listar = explode(";", trim($linha));
$listarUsuarios .= "nome:" . $listar[0] . "<br>";
$listarUsuarios .= "cpf:" . $listar[1] . "<br>";
}
}
fclose($arqUsuario);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Listagem Usuarios</title>
</head>
<body>
<h1>Lista de Usuarios</h1>
<?php 
echo $listarUsuarios; 
?>
<br><a href="criar_usuario.php">Voltar</a>
</body>
</html>