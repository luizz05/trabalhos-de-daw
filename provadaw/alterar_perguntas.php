<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') 
{
$id = $_POST["id"];
$pergunta = $_POST["pergunta"];
$resposta1 = $_POST["resposta1"];
$resposta2 = $_POST["resposta2"];
$resposta3 = $_POST["resposta3"];
$resposta4 = $_POST["resposta4"];
$certa = $_POST["certa"];
if(file_exists("perguntas.txt")) 
{
$arqAlterar = fopen("perguntas.txt", "r");
$novo = "";
while(($linha = fgets($arqAlterar)) !== false) 
{
if(trim($linha) != "") 
{
$alterar = explode(";", trim($linha));   
if($alterar[0] == $id) 
{
$linhaNova = $id . ";" . $pergunta . "\n";
$novo .= $linhaNova;
} 
else
{
$novo .= $linha;
}
}
}
fclose($arqAlterar);
$arqPerguntas = fopen("perguntas.txt", "w");
fwrite($arqPerguntas, $novo);
fclose($arqPerguntas);
}
if(file_exists("respostas.txt")) 
{
$arqAlterar = fopen("respostas.txt", "r");
$novo = "";
while(($linha = fgets($arqAlterar)) !== false) 
{
if(trim($linha) != "") 
{
$alterar = explode(";", trim($linha));
if($alterar[1] == $id) 
{
$linhaNova = "";
if($alterar[0] == 1)
{
if($certa == 1)
{
$linhaNova = "1;" . $id . ";" . $resposta1 . ";1\n";
}
else
{
$linhaNova = "1;" . $id . ";" . $resposta1 . ";0\n";
}
}
if($alterar[0] == 2)
{
if($certa == 2)
{
$linhaNova = "2;" . $id . ";" . $resposta2 . ";1\n";
}
else
{
$linhaNova = "2;" . $id . ";" . $resposta2 . ";0\n";
}
}
if($alterar[0] == 3)
{
if($certa == 3)
{
$linhaNova = "3;" . $id . ";" . $resposta3 . ";1\n";
}
else
{
$linhaNova = "3;" . $id . ";" . $resposta3 . ";0\n";
}
}
if($alterar[0] == 4)
{
if($certa == 4)
{
$linhaNova = "4;" . $id . ";" . $resposta4 . ";1\n";
}
else
{
$linhaNova = "4;" . $id . ";" . $resposta4 . ";0\n";
}
}
$novo .= $linhaNova;
}
}
}
fclose($arqAlterar);
$arqRespostas = fopen("respostas.txt", "w");
fwrite($arqRespostas, $novo);
fclose($arqRespostas);
}
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Alterar Perguntas</title>
</head>
<body>
<h1>Alterar Perguntas</h1>
<form action="alterar_perguntas.php" method="POST">
ID da Pergunta que deseja alterar:
<input type="text" name="id">
<br>
Nova Pergunta:
<input type="text" name="pergunta">
<br>
Resposta 1:
<input type="text" name="resposta1">
<br>
Resposta 2:
<input type="text" name="resposta2">
<br>
Resposta 3:
<input type="text" name="resposta3">
<br>
Resposta 4:
<input type="text" name="resposta4">
<br>
Qual está certa:
<select name="certa">
<option value="1">Resposta 1</option>
<option value="2">Resposta 2</option>
<option value="3">Resposta 3</option>
<option value="4">Resposta 4</option>
</select>
<br><br>
<input type="submit" value="Alterar">
</form>
<br>
<a href="criar_perguntas.php">Voltar</a>
</body>
</html>
