<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
$id = $_POST["id"];
$pergunta = $_POST["pergunta"];
$resposta1 = $_POST["resposta1"];
$resposta2 = $_POST["resposta2"];
$resposta3 = $_POST["resposta3"];
$resposta4 = $_POST["resposta4"];
$certa = $_POST["certa"];

if(file_exists("perguntas.txt")) {
$arqAlterar = fopen("perguntas.txt", "r");
$novo = "";
while(($linha = fgets($arqAlterar)) !== false) {
if(trim($linha) != "") {
$alterar = explode(";", trim($linha));
if($alterar[0] == $id) {
$linha_nova = $id . ";" . $pergunta . ";" . $resposta1 . ";" . $resposta2 . ";" . $resposta3 . ";" . $resposta4 . ";" . $certa . "\n";
$novo .= $linha_nova;
} else {
$novo .= $linha;
}
}
}
fclose($arqAlterar);
$arqPerguntas = fopen("perguntas.txt", "w");
fwrite($arqPerguntas, $novo);
fclose($arqPerguntas);
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Alterar Perguntas</title>
</head>
<body>
<h1>Alterar Perguntas</h1>
<form action="alterar_perguntas.php" method="POST">
Informe o ID da Pergunta que vai fazer a alteracao: <input type="text" name="id"><br>
Nova Pergunta: <input type="text" name="pergunta"><br>
Resposta 1: <input type="text" name="resposta1"><br>
Resposta 2: <input type="text" name="resposta2"><br>
Resposta 3: <input type="text" name="resposta3"><br>
Resposta 4: <input type="text" name="resposta4"><br>
Nova Resposta: <input type="text" name="resposta"><br>
<br><input type="submit" value="Alterar">
</form>
<br><a href="criar_perguntas.php">Voltar</a>
</body>
</html>