<?php
$msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$matricula = $_POST["matricula"];
$end = $_POST["end"];

$msg = "";
echo "nome: " . $nome . " cpf: " . $cpf .  " matricula: " . $matricula . "end:" . $end;
if (!file_exists("professor.txt")) 
{
$arqProf = fopen("professor.txt","w") or die("erro ao criar arquivo");
$linha = "nome;cpf;matricula;end\n";
fwrite($arqProf,$linha);
fclose($arqProf);
}
$arqProf = fopen("professor.txt","a") or die("erro ao criar arquivo");

$linha = $nome . ";" . $cpf . ";" . $matricula . ";" . $end . ";" ."\n";
fwrite($arqProf,$linha);
fclose($arqProf);
$msg = "Deu tudo certo!!!";
}
?>
<!DOCTYPE html>
<html>

<head>

</head>
<body>
<h1> Professores</h1>
<form method="POST">
nome: <input type="text" name="nome">
<br><br>
cpf: <input type="text" name="cpf">
<br><br>
matricula: <input type="text" name="matricula">
<br><br>
endereço: <input type="text" name="end">
<br><br>
<input type="submit" value="Registrar professor">
</form>
<p><?php echo $msg ?></p>
<br>
<a href="alterando.php">Alterar professor</a>
</body>
</html>