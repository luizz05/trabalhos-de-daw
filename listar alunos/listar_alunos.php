<!DOCTYPE html>
<html>
<head>
<meta charset="UTF8">
<meta name="viewport" content="width=device-width, initial scale=1.0">
<tittle>Listar Aluno</tittle>
</head>
<body>
<table>
<body>
<table style="border-spacing: 20px 0;">
<tr><th>Nome</th><th>Matricula</th><th>Email</th><th>Ações</th>
<?php
$arqAluno = fopen("alunos.txt","r") or die("erro ao abrir arquivo");
while(($linha = fgets($arqAluno))!==false) {
$colunaDados = explode(";", $linha);
echo "<tr><td>" . $colunaDados[0] . "</td>" .
"<td>" . $colunaDados[1] . "</td>" .
"<td>" . $colunaDados[2] . "</td>";
echo "<td>
<form action='alterar.php' method='GET'>
<input type='text' size='5' value='" . $colunaDados[1] . "' name='matricula'>
<input type='submit' value='Alterar'>
</form>
<form action='excluir.php' method='GET'>
<input type='text' size='5' value='" . $colunaDados[1] . "' name='matricula'>
<input type='submit' value='Excluir'>
</form>
</td>";
echo "</tr>";
}
fclose($arqAluno);
$msg = "deu tudo certo!!!";
?>
</table>
<p><?php echo $msg ?></p>
<br>
<a href="alterar.php"></a>
</body>
</html>