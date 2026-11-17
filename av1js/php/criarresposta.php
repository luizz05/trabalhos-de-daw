<?php

if($_SERVER['REQUEST_METHOD'] == 'GET')
{
$IDperg = $_GET["IDperg"];
$IDresp = $_GET["IDresp"];
$arquivo = "../respostas.txt";
$linha = $IDperg . ";" . $IDresp . "\n";
if(!file_exists($arquivo))
{
$arq_respostas = fopen($arquivo, "w") or die("Não foi possível criar o arquivo.");
fwrite($arq_respostas, $linha);
fclose($arq_respostas);
}
else
{
$arq_respostas = fopen($arquivo, "a") or die("Não foi possível abrir o arquivo.");
fwrite($arq_respostas, $linha);
fclose($arq_respostas);
}
echo "Resposta cadastrada";
}
?>