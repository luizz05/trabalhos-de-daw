<?php
if($_SERVER['REQUEST_METHOD'] == 'GET')
{
$cpf = $_GET["cpf"];
$arquivo = "../usuarios.txt";

if(file_exists($arquivo))
{
$arq_excluir = fopen($arquivo, "r");
$novo = "";

while(($linha = fgets($arq_excluir)) !== false)
{
if(trim($linha) != "")
{
$excluir = explode(";", trim($linha));

if($excluir[1] != $cpf)
{
$novo .= $linha;
}
}
}
fclose($arq_excluir);
$arq_usuarios = fopen($arquivo, "w");
fwrite($arq_usuarios, $novo);
fclose($arq_usuarios);
echo "Operação realizada!";
}
else
{
echo "Não foi possível localizar o arquivo.";
}
}
?>