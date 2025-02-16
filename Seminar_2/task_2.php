<?php
function add(float $a, float $b): float {
    return $a + $b;
}

function sub(float $a, float $b): float {
    return $a - $b;
}

function mult(float $a, float $b): float {
    return $a * $b;
}

function div(float $a, float $b): float|string {
    if ($b == 0) {
        return "Деление на 0 невозможно!";
    }
    return $a / $b;
}

function calc(float $a, float $b, string $action): float|string {
    $res = NULL;
    switch ($action) {
        case "+":
            $res = add($a, $b);
            break;
        case "-":
            $res = sub($a, $b);
            break;
        case "*":
            $res = mult($a, $b);
            break;
        case "/":
            $res = div($a, $b);
            break;
        default:
            $res = "Непредусмотренное или несуществующее действие";
            break;
    }
    return $res;
}

$a = 3.3;
$b = 0;
echo calc($a, $b, "+") . PHP_EOL;
echo calc($a, $b, "-") . PHP_EOL;
echo calc($a, $b, "*") . PHP_EOL;
echo calc($a, $b, "/") . PHP_EOL;
echo calc($a, $b, "@");

