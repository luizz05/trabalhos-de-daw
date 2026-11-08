<?php
if($_SERVER['REQUEST_METHOD'] == 'GET')
{
$n1 = $_GET["num1"];
$n2 = $_GET["num2"];
$op = $_GET["op"];

switch($op)
{
case '+';
$resultado = $n1 + $n2;
break;

case '-';
$resultado = $n1 - $n2;
break;

case '*';
$resultado = $n1 * $n2;
break;

case '/';
$resultado = $n1 / $n2;
break;
}
echo $resultado;
}