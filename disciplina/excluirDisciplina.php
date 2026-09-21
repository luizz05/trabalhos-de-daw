<?php

$msg = '';
$disciplina = '';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$sigla = $_POST['sigla'];
echo "sigla recebida: " . $sigla . "<br>";
$arqDisciplina = fopen("disciplinas.txt", "r");
while(($linha = fgets($arqDisciplina)) !== false)
{
$arqRemover = explode(";", $linha);
echo "Sigla do arquivo: " . $arqRemover[1] . "<br>";
if($arqRemover[1] != $sigla) {
$disciplina = $disciplina . $linha;
} 
else 
{
$msg = "Disciplina excluida";
}
}
fclose($arqDisciplina);
$arqDisciplina = fopen("disciplinas.txt", "w");
fwrite($arqDisciplina, $disciplina);
fclose($arqDisciplina);
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Criar Nova Disciplina</h1>
<form method="POST">
Informe a sigla: <input type="text" name="sigla">
<br><br>
<input type="submit" value="Excluir">
</form>
<p><?php echo $msg ?></p>
<br><a href="IncluirDisciplina.php">Voltar</a>
<br>
</body>
</html>
