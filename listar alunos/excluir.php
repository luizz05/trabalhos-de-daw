<?php
$msg = "";
$nome = "";
$matricula = "";
$email = "";
if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['matricula'])) {
$matricula = $_GET['matricula'];
$arqAluno = fopen("alunos.txt","r") or die("erro ao abrir arquivo");
while(($linha = fgets($arqAluno)) !== false) {
$colunaDados = explode(";", $linha);
if(trim($colunaDados[1]) == $matricula) {
$nome = trim($colunaDados[0]);
$matricula = trim($colunaDados[1]);
$email = trim($colunaDados[2]);
}
}
fclose($arqAluno);
}
else if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['matricula'])) {
$matricula = $_POST['matricula'];
$arqAluno = fopen("alunos.txt","r") or die("erro ao abrir arquivo");
$arqTemp = fopen("alunosTemp.txt","w") or die("erro ao criar arquivo");
while(($linha = fgets($arqAluno)) !== false) {
$colunaDados = explode(";", $linha);
if($matricula != trim($colunaDados[1])) {
fprintf($arqTemp, "%s", $linha);
}
}
fclose($arqAluno);
fclose($arqTemp);
rename("alunosTemp.txt", "alunos.txt");
$msg = "Aluno excluído com sucesso!";
$matricula = "";
$nome = "";
$email = "";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Excluir Aluno</title>
</head>
<body>
<form action="excluir.php" method="POST">
<h1>Deseja realmente excluir esse aluno?</h1>
<h2>Nome: <?php echo $nome; ?></h2>
<h2>Matricula: <?php echo $matricula; ?></h2>
<h2>Email: <?php echo $email; ?></h2>
<input type="hidden" name="matricula" value="<?php echo $matricula; ?>">
<input type="submit" value="Confirmar exclusão">
<br><br>
<a href="listar_alunos.php">Voltando para a lista de alunos</a>
</form>
<p><?php echo $msg; ?></p>
</body>
</html>
