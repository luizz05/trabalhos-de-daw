<?php
$msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
$nome = $_POST["nome"];
$email = $_POST["email"];
$matricula = $_POST["matricula"];
$msg = "";
echo "nome: " . $nome . " email: " . $email .  " matricula: " . $matricula;
if (!file_exists("alunos.txt")) 
{
$arqAlun = fopen("alunos.txt","w") or die("erro ao criar arquivo");
$linha = "nome;email;matricula;cpf\n";
fwrite($arqAlun,$linha);
fclose($arqAlun);
}
$arqAlun = fopen("alunos.txt","a") or die("erro ao criar arquivo");

$linha = $nome . ";" . $email . ";" . $matricula . ";" . "\n";
fwrite($arqAlun,$linha);
fclose($arqAlun);
$msg = "Deu tudo certo!!!";
}
?>
<!DOCTYPE html>
<html>

<head>

</head>
<body>
<h1> Criar novo aluno</h1>
<form method="POST">
nome: <input type="text" name="nome">
<br><br>
email: <input type="text" name="email">
<br><br>
matricula: <input type="number" name="matricula">
<br><br>
<input type="submit" value="Criar novo aluno">
</form>
<p><?php echo $msg ?></p>
<br>
</body>
</html>