<?php
$listar_usuarios = "";
$arquivo = "../usuarios.txt";

if(file_exists($arquivo))
{
$arq_usuarios = fopen($arquivo, "r") or die("Não foi possível abrir o arquivo.");

while(($linha = fgets($arq_usuarios)) !== false)
{
if(trim($linha) != "")
{
$listar = explode(";", trim($linha));

$listar_usuarios .= "Nome: " . $listar[0] . "<br>";
$listar_usuarios .= "CPF: " . $listar[1] . "<br><br>";
}
}
fclose($arq_usuarios);
}
echo $listar_usuarios;
?>