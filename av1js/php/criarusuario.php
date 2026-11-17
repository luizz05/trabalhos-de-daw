<?php
if($_SERVER['REQUEST_METHOD'] == 'GET')
{
$nome = $_GET["nome"];
$cpf = $_GET["cpf"];

$arquivo = "../usuarios.txt";
$linha = $nome . ";" . $cpf . "\n";

if(!file_exists($arquivo))
{
$arq_usuarios = fopen($arquivo, "w") or die("Não foi possível criar o arquivo.");
fwrite($arq_usuarios, $linha);
fclose($arq_usuarios);
}
else
{
$arq_usuarios = fopen($arquivo, "a") or die("Não foi possível abrir o arquivo.");
fwrite($arq_usuarios, $linha);
fclose($arq_usuarios);
}
echo "Usuário cadastrado";
}
?>