<?php

if($_SERVER['REQUEST_METHOD'] == 'GET')
{
$nome = $_GET["nome"];
$cpf = $_GET["cpf"];

$arquivo = "../usuarios.txt";

if(file_exists($arquivo))
{
$arq_usuario = fopen($arquivo, "r");
$novo = "";

while(($linha = fgets($arq_usuario)) !== false)
{
if(trim($linha) != "")
{
$alterar = explode(";", trim($linha));

if($alterar[1] == $cpf)
{
$linha_nova = $nome . ";" . $cpf . "\n";
$novo .= $linha_nova;
}
else
{
$novo .= $linha;
}
}
}
fclose($arq_usuario);
$arq_usuarios = fopen($arquivo, "w");
fwrite($arq_usuarios, $novo);
fclose($arq_usuarios);
echo "Usuário alterado";
}
else
{
echo "Arquivo não encontrado.";
}
}
?>
