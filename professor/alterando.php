<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
$matricula = $_POST['matricula'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$end = $_POST['end'];

 if (file_exists("professor.txt")) 
{
$arqProf = fopen("professor.txt", "r");

$professor = "";

while (($linha = fgets($arqProf)) !== false) 
{
$colunaDados = explode(";", trim($linha));

if ($colunaDados[2] == $matricula) 
{
$linha2 = $nome . ";" . $cpf . ";" . $matricula . ";" . $end . "\n";

$professor = $professor . $linha2;
} 
else 
{
 $professor = $professor . $linha;
}
}
fclose($arqProf);
$arqProf = fopen("professor.txt", "w");
fwrite($arqProf, $professor);
fclose($arqProf);
}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Alterar</title>
</head>
<body>
<h1>Alterar</h1>
<form action="" method="POST">
Matrícula:
<input type="text" name="matricula">
<br><br>
Nome:
<input type="text" name="nome">
<br><br>
CPF:
<input type="text" name="cpf">
<br><br>
Endereço:
<input type="text" name="end">
<br><br>
<input type="submit" value="Alterar">
</form>
<br>
<a href="registro.php">Voltar</a>
</body>
</html>