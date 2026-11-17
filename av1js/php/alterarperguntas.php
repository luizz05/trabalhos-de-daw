<?php

if($_SERVER['REQUEST_METHOD'] == 'GET')
{
$id = $_GET["id"];
$pergunta = $_GET["pergunta"];
$resposta1 = $_GET["resposta1"];
$resposta2 = $_GET["resposta2"];
$resposta3 = $_GET["resposta3"];
$resposta4 = $_GET["resposta4"];
$certa = $_GET["certa"];

if(file_exists("../perguntas.txt"))
{
$arqAlterar = fopen("../perguntas.txt", "r");
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
$arqPerguntas = fopen("../perguntas.txt", "w");
fwrite($arqPerguntas, $novo);
fclose($arqPerguntas);
}
if(file_exists("../respostas.txt"))
{
$arqAlterar = fopen("../respostas.txt", "r");
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
else
{
$novo .= $linha;
}
}
}
fclose($arqAlterar);
$arqRespostas = fopen("../respostas.txt", "w");
fwrite($arqRespostas, $novo);
fclose($arqRespostas);
}
echo "Pergunta alterada com sucesso!";
}
?>