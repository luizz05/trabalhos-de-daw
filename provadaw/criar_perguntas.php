<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
$id = $_POST["id"];
$pergunta = $_POST["pergunta"];
$res1 = $_POST["resposta1"];
$res2 = $_POST["resposta2"];
$res3 = $_POST["resposta3"];
$res4 = $_POST["resposta4"];
$certa = $_POST["certa"];

if(!file_exists("perguntas.txt")){
$p = fopen("perguntas.txt", "w") or die("Erro ao criar arquivo de perguntas. ");
$linha = "ID;PERGUNTA\n";
fwrite($p,$linha);
fclose($p);
}
$p = fopen("perguntas.txt", "a") or die("Erro ao abrir arquivo de perguntas. ");
$linha = $id . ";" . $pergunta . "\n";
fwrite($p, $linha);
fclose($p);
if(!file_exists("respostas.txt")){
$r = fopen("respostas.txt","w") or die("Erro ao criar arquivo de respostas.");
$linha = "ID;IDPERGUNTA;RESPOSTA;CERTA\n";
fwrite($r,$linha);
fclose($r);
}
$r = fopen("respostas.txt", "a") or die("Erro ao abrir arquivo de respostas. ");
if($certa==1){
$linha =  "1;" . $id . ";" . $res1 . ";1\n";
}else{
$linha = "1;" . $id . ";" . $res1 . ";0\n";
}
fwrite($r, $linha);
if($certa == 2){
$linha = "2;" . $id . ";" . $res2 . ";1\n";
}
else{
$linha = "2;" . $id . ";" . $res2 . ";0\n";
}
fwrite($r, $linha);
if($certa == 3){
$linha = "3;" . $id . ";" . $res3 . ";1\n";
}
else{
$linha = "3;" . $id . ";" . $res3 . ";0\n";
}
fwrite($r, $linha);
if($certa==4){
$linha = "4;" . $id . ";" . $res4 . ";1\n";
}
else{
$linha = "4;" . $id . ";" . $res4 . ";0\n";
}
fwrite($r, $linha);
       
fclose($r);
$msg = "Cadastro de pergunta deu certo";
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
<a href="index.php">Voltar</a>
</form>
</body>
</html>
