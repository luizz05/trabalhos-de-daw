<?php

$pergunta = "";
$arquivo = "../perguntas.txt";

if(file_exists($arquivo))
{
$arqPerguntas = fopen($arquivo, "r");

while(($linha = fgets($arqPerguntas)) !== false)
{
if(trim($linha) != "")
{
$perg = explode(";", trim($linha));

$pergunta .= "ID: " . $perg[0] . "<br>";
$pergunta .= "Pergunta: " . $perg[1] . "<br>";
$pergunta .= "1) " . $perg[2] . "<br>";
$pergunta .= "2) " . $perg[3] . "<br>";
$pergunta .= "3) " . $perg[4] . "<br>";
$pergunta .= "4) " . $perg[5] . "<br>";
$pergunta .= "Resposta Correta: " . $perg[6] . "<br><br>";
}
}
fclose($arqPerguntas);
}
echo $pergunta;
?>