<?php
$msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$msg = "";
echo "nome: " . $nome . " cpf: " . $cpf;
if (!file_exists("usuarios.txt")) 
{
$arqUsuario = fopen("usuarios.txt","w") or die("erro ao criar arquivo");
$linha = "nome;cpf\n";
fwrite($arqUsuario,$linha);
fclose($arqUsuario);
}
$arqUsuario = fopen("usuarios.txt","a") or die("erro ao criar arquivo");

$linha = $nome . ";" . $cpf . ";" . "\n";
fwrite($arqUsuario,$linha);
fclose($arqUsuario);
}
?>
<!DOCTYPE html>
<html>

<head>

</head>
<body>
<h1> Criar Usuario</h1>
<form method="POST">
nome: <input type="text" name="nome">
<br><br>
cpf: <input type="text" name="cpf">
<br><br>
<input type="submit" value="Criar novo aluno">
</form>
<br><a href="listar.php">Listar Usuarios</a>
<br><a href="alterar.php">Alterar Usuarios</a>
<br><a href="excluir.php">Excluir Usuarios</a>
<br><a href="../criar_perguntas.php">Voltar</a>
<br>
</body>
</html>
