<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') 
{
$id = $_POST["id"];
if(file_exists("perguntas.txt")) {
$arqExcluir = fopen("perguntas.txt", "r");
$novo = "";
while(($linha = fgets($arqExcluir)) !== false) 
{
if(trim($linha) != "") {
$excluir = explode(";", trim($linha));
if($excluir[0] != $id) {
$novo .= $linha;
}
}
}
fclose($arqExcluir);
$arqPerguntas = fopen("perguntas.txt", "w");
fwrite($arqPerguntas, $novo);
fclose($arqPerguntas);
}
if(file_exists("respostas.txt")) 
{
$arqRespostas = fopen("respostas.txt", "r");
$novaResposta = "";
while(($linha = fgets($arqRespostas)) !== false) 
{
if(trim($linha) != "") {
$excluirResposta = explode(";", trim($linha));
if($excluirResposta[0] != $id) 
{
$novaResposta .= $linha;
}
}
}
fclose($arqRespostas);
$arqRespostas = fopen("respostas.txt", "w");
fwrite($arqRespostas, $novaResposta);
fclose($arqRespostas);
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Excluir Pergunta</title>
</head>
<body>
<h1>Excluindo Pergunta</h1>
<form action="excluir_perguntas.php" method="POST">
Informe o ID da pergunta: <input type="text" name="id">
<input type="submit" value="Excluir">
</form>
<br>
<a href="criar_perguntas.php">Voltar</a>
</body>
</html>