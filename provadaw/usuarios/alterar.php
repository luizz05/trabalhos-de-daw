<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
if(file_exists("usuarios.txt")) {
$arq_usuario = fopen("usuarios.txt", "r");
$novo = "";
while(($linha = fgets($arq_usuario)) !== false) {
if(trim($linha) != "") {
$alterar = explode(";", trim($linha));               
if($alterar[1] == $cpf) {
$linha_nova = $nome . ";" . $cpf . "\n";
$novo .= $linha_nova;
} else {
$novo .= $linha;
}
}
}
fclose($arq_usuario);

$arq_usuarios = fopen("usuarios.txt", "w");
fwrite($arq_usuarios, $novo);
fclose($arq_usuarios);
    }
}
?>
<form action="alterar.php" method="POST">
<h1>Alterar Usuarios</h1>
<br><br>
Nome
<input type="text" name="nome" value="<?php echo $nome ?>">
<br><br>
Cpf
<input type="text" name="cpf" value="<?php echo $cpf ?>">
<br><br>
<input type="submit" value="Alteracao">
</form>
<br>
<br><a href="criar_usuario.php">Voltando</a>
</body>
</html>
