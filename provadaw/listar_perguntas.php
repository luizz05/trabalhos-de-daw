<?php
$pergunta = "";
if(file_exists("perguntas.txt")) 
{
$arqPerguntas = fopen("perguntas.txt", "r");
while(($linha = fgets($arqPerguntas)) !== false) 
{
if(trim($linha) != "") 
{
$perg = explode(";", trim($linha));
if($perg[0] != "ID")
{
$pergunta .= "ID: " . $perg[0] . "<br>";
$pergunta .= "Pergunta: " . $perg[1] . "<br>";
if(file_exists("respostas.txt"))
{
$arqRespostas = fopen("respostas.txt", "r");
while(($linhaResposta = fgets($arqRespostas)) !== false) 
{
if(trim($linhaResposta) != "") 
{
$resposta = explode(";", trim($linhaResposta));
if($resposta[1] == $perg[0])
{
$pergunta .= $resposta[0] . ") " . $resposta[2];
if($resposta[3] == "1")
{
$pergunta .= " - Resposta Correta";
}
$pergunta .= "<br>";
}
}
}
fclose($arqRespostas);
}
$pergunta .= "<br>";
}
}
}
fclose($arqPerguntas);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Listar Perguntas</title>
</head>
<body>
<h1>Lista de Perguntas</h1>
<?php 
echo $pergunta; 
?>
<br>
<a href="criar_perguntas.php">Voltar</a>
</body>
</html>