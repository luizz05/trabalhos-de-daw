<?php

$num1 = $_POST["num1"];
$num2 = $_POST["num2"];
$op = $_POST["op"];

switch($op)
{
case "+";
$resultado = $num1 + $num2;
break;

case "-";
$resultado = $num1 - $num2;
break;

case "*";
$resultado = $num1 * $num2;
break;

case "/";
$resultado = $num1 / $num2;
break;

}
echo "resultado: $resultado";

?>
