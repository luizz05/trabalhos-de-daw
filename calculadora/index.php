<!DOCTYPE html>
<html>
<head>
    <title>Calculadora</title>
</head>

<body>

<form action="operacao.php" method="POST">

numero 1: <input type="number" name="num1">
<br><br>

numero 2: <input type="number" name="num2">
<br><br>
<select name="op">

<option value="+">+</option>
<option value="-">-</option>
<option value="*">*</option>
<option value="/">/</option>
</select>

<br><br>

<button type="submit">Calcular</button>

</form>

</body>
</html>