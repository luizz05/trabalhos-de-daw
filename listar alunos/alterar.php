<?php
$msg = "";
$matricula = "";
$matriculaAntiga = "";
$nome = "";
$email = "";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
$matriculaAntiga = $_POST['matriculaAntiga'];
$matricula = $_POST['matricula'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$arqAluno = fopen("alunos.txt","r") or die("erro ao abrir arquivo");
$arqTemp = fopen("alunosTemp.txt","w") or die("erro ao criar arquivo");
while(($linha = fgets($arqAluno)) !== false)
{
$colunaDados = explode(";", $linha);
if(trim($colunaDados[1]) != $matriculaAntiga) {
fprintf($arqTemp, "%s", $linha);
}
else {
fprintf($arqTemp, "%s;%s;%s\n", $nome, $matricula, $email);
}
}
fclose($arqAluno);
fclose($arqTemp);
$arqAluno = fopen("alunos.txt","w") or die("erro ao abrir arquivo");
$arqTemp = fopen("alunosTemp.txt","r") or die("erro ao abrir arquivo");
while(($linha = fgets($arqTemp)) !== false)
{
fprintf($arqAluno, "%s", $linha);
}
fclose($arqAluno);
fclose($arqTemp);
$msg = "Deu certo";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Alterar aluno</title>
</head>
<body>
<?php
if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['matricula'])) {
$matricula = $_GET['matricula'];
$matriculaAntiga = $matricula;
$arqAluno = fopen("alunos.txt","r") or die("erro ao abrir arquivo");
while(($linha = fgets($arqAluno)) !== false)
{
$colunaDados = explode(";", $linha);
if(trim($colunaDados[1]) == $matricula) {
$nome = trim($colunaDados[0]);
$email = trim($colunaDados[2]);
}
}
fclose($arqAluno);
}
?>
<form action="alterar.php" method="POST">
Informe as informações para alterar o aluno
<br><br>
Nome
<input type="text" name="nome" value="<?php echo $nome ?>">
<br><br>
Matricula
<input type="hidden" name="matriculaAntiga" value="<?php echo $matriculaAntiga ?>">
<input type="text" name="matricula" value="<?php echo $matricula ?>">
<br><br>
Email
<input type="text" name="email" value="<?php echo $email ?>">
<br><br>
<input type="submit" value="Confirmar alteração">
</form>
<?php echo "<h1>$msg</h1>"; ?>
<br>
<a href="listar_alunos.php">Voltar para a listagem de alunos</a>
</body>
</html>