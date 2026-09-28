<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
$id = $_POST["id"];
$pergunta = $_POST["pergunta"];
$resp1 = $_POST["resp1"];
$resp2 = $_POST["resp2"];
$resp3 = $_POST["resp3"];
$resp4 = $_POST["resp4"];
$certa = $_POST["certa"];
if (!file_exists("perguntas.txt")) 
{
$arqPergunta = fopen("perguntas.txt","w") or die("erro ao criar arquivo");
$linha = "id;pergunta";
fwrite($arqPergunta,$linha);
fclose($arqPergunta);
}
$arqPergunta = fopen("perguntas.txt","a") or die("erro ao criar arquivo");
$linha = $id . ";" . $pergunta;
fwrite($arqPergunta,$linha);
fclose($arqPergunta);
if (!file_exists("respostas.txt")) 
{
$arqResposta = fopen("respostas.txt","w") or die("erro ao criar arquivo");
$linha = "id;idPergunta;resposta;certa";
fwrite($arqResposta,$linha);
fclose($arqResposta);
}
$arqResposta = fopen("respostas.txt","a") or die("erro ao criar arquivo");
if ($certa == 1)
{
$linha = "1;" . $id . ";" . $resp1 . ";1";
fwrite($arqResposta,$linha);
$linha = "2;" . $id . ";" . $resp2 . ";0";
fwrite($arqResposta,$linha);
$linha = "3;" . $id . ";" . $resp3 . ";0";
fwrite($arqResposta,$linha);
$linha = "4;" . $id . ";" . $resp4 . ";0";
fwrite($arqResposta,$linha);
 }
if ($certa == 2)
{
$linha = "1;" . $id . ";" . $resp1 . ";0";
fwrite($arqResposta,$linha);
$linha = "2;" . $id . ";" . $resp2 . ";1";
fwrite($arqResposta,$linha);
$linha = "3;" . $id . ";" . $resp3 . ";0";
fwrite($arqResposta,$linha);
$linha = "4;" . $id . ";" . $resp4 . ";0";
fwrite($arqResposta,$linha);
}
if ($certa == 3)
{
$linha = "1;" . $id . ";" . $resp1 . ";0";
fwrite($arqResposta,$linha);
$linha = "2;" . $id . ";" . $resp2 . ";0";
fwrite($arqResposta,$linha);
$linha = "3;" . $id . ";" . $resp3 . ";1";
fwrite($arqResposta,$linha);
$linha = "4;" . $id . ";" . $resp4 . ";0";
fwrite($arqResposta,$linha);
}
if ($certa == 4)
{
$linha = "1;" . $id . ";" . $resp1 . ";0";
fwrite($arqResposta,$linha);
$linha = "2;" . $id . ";" . $resp2 . ";0";
fwrite($arqResposta,$linha);
$linha = "3;" . $id . ";" . $resp3 . ";0";
fwrite($arqResposta,$linha);
$linha = "4;" . $id . ";" . $resp4 . ";1";
fwrite($arqResposta,$linha);
}
fclose($arqResposta);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<h1>criar pergunta</h1>
<form method="POST">
ID:
<input type="number" name="id">
<br><br>
pergunta:
<input type="text" name="pergunta">
<br><br>
resposta 1:
<input type="text" name="resp1">
<br><br>
resposta 2:
<input type="text" name="resp2">
<br><br>
resposta 3:
<input type="text" name="resp3">
<br><br>
resposta 4:
<input type="text" name="resp4">
<br><br>
qual é a certa:
<select name="certa">
<option value="1">resposta 1</option>
<option value="2">resposta 2</option>
<option value="3">resposta 3</option>
<option value="4">resposta 4</option>
</select>
<br><br>
<input type="submit" value="Criar pergunta">
</form>
</body>
</html>