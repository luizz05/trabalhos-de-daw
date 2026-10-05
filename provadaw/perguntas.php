<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
$id = $_POST["id"];
$pergunta = $_POST["pergunta"];
$res1 = $_POST["resposta1"];
$res2 = $_POST["resposta2"];
$res3 = $_POST["resposta3"];
$res4 = $_POST["resposta4"];
$certa = $_POST["certa"];
if(!file_exists("perguntas.txt")) {
$arq_perguntas = fopen("perguntas.txt", "w")or die("ERROR! Erro ao abrir o arquivo.");
$linha = $id . ";" . $pergunta . ";" . $res1 . ";" . $res2 . ";" . $res3 . ";" . $res4 . ";" . $certa . "\n";
fwrite($arq_perguntas, $linha);
fclose($arq_perguntas);
} else {
$arqPerguntas = fopen("perguntas.txt", "a")or die("Não foi possível abrir o arquivo.");
$linha = $id . ";" . $pergunta . ";" . $res1 . ";" . $res2 . ";" . $res3 . ";" . $res4 . ";" . $certa . "\n";
fwrite($arqPerguntas, $linha);
fclose($arqPerguntas);
}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<h1>Criar pergunta</h1>
<form method="POST">
ID:
<input type="number" name="id">
<br><br>
Pergunta:
<input type="text" name="pergunta">
<br><br>
Resposta 1:
<input type="text" name="resposta1">
<br><br>
Resposta 2:
<input type="text" name="resposta2">
<br><br>
Resposta 3:
<input type="text" name="resposta3">
<br><br>
Resposta 4:
<input type="text" name="resposta4">
<br><br>
Qual esta certa:
<select name="certa">
<option value="1">Resposta 1</option>
<option value="2">Resposta 2</option>
<option value="3">Resposta 3</option>
<option value="4">Resposta 4</option>
</select>
<br><br>
<input type="submit" value="Criar pergunta">
</form>
</body>
</html>
