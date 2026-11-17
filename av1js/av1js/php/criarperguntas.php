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

if(!file_exists("../perguntas.txt"))
{
$p = fopen("../perguntas.txt", "w") or die("Erro ao criar arquivo de perguntas.");
$linha = "ID;PERGUNTA\n";
fwrite($p, $linha);
fclose($p);
}

$p = fopen("../perguntas.txt", "a") or die("Erro ao abrir arquivo de perguntas.");

$linha = $id . ";" . $pergunta . "\n";

fwrite($p, $linha);
fclose($p);
if(!file_exists("../respostas.txt"))
{
$r = fopen("../respostas.txt", "w") or die("Erro ao criar arquivo de respostas.");
$linha = "ID;IDPERGUNTA;RESPOSTA;CERTA\n";
fwrite($r, $linha);
fclose($r);
}
$r = fopen("../respostas.txt", "a") or die("Erro ao abrir arquivo de respostas.");
if($certa == 1)
{
$linha = "1;" . $id . ";" . $resposta1 . ";1\n";
}
else
{
$linha = "1;" . $id . ";" . $resposta1 . ";0\n";
}
fwrite($r, $linha);
if($certa == 2)
{
$linha = "2;" . $id . ";" . $resposta2 . ";1\n";
}
else
{
$linha = "2;" . $id . ";" . $resposta2 . ";0\n";
}
fwrite($r, $linha);
if($certa == 3)
{
$linha = "3;" . $id . ";" . $resposta3 . ";1\n";
}
else
{
$linha = "3;" . $id . ";" . $resposta3 . ";0\n";
}
fwrite($r, $linha);
if($certa == 4)
{
$linha = "4;" . $id . ";" . $resposta4 . ";1\n";
}
else
{
$linha = "4;" . $id . ";" . $resposta4 . ";0\n";
}
fwrite($r, $linha);
fclose($r);
echo "Cadastro de pergunta deu certo";
}
?>