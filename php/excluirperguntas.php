<?php

if($_SERVER['REQUEST_METHOD'] == 'GET')
{
$id = $_GET["id"];
if(file_exists("../perguntas.txt"))
{
$arqExcluir = fopen("../perguntas.txt", "r");
$novo = "";
while(($linha = fgets($arqExcluir)) !== false)
{
if(trim($linha) != "")
{
$excluir = explode(";", trim($linha));
if($excluir[0] != $id)
{
$novo .= $linha;
}
}
}
fclose($arqExcluir);
$arqPerguntas = fopen("../perguntas.txt", "w");
fwrite($arqPerguntas, $novo);
fclose($arqPerguntas);
}
if(file_exists("../respostas.txt"))
{
$arqRespostas = fopen("../respostas.txt", "r");
$novaResposta = "";
while(($linha = fgets($arqRespostas)) !== false)
{
if(trim($linha) != "")
{
$excluirResposta = explode(";", trim($linha));
if($excluirResposta[1] != $id)
{
$novaResposta .= $linha;
}
}
}
fclose($arqRespostas);
$arqRespostas = fopen("../respostas.txt", "w");
fwrite($arqRespostas, $novaResposta);
fclose($arqRespostas);
}
echo "Pergunta excluída com sucesso!";
}
?>