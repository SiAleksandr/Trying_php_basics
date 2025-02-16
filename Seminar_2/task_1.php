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

$a = 3.3;
$b = 2.2;
echo "add " . add($a, $b) . PHP_EOL;
echo "sub " . sub($a, $b) . PHP_EOL;
echo "mult " . mult($a, $b) . PHP_EOL;
echo "div " . div($a, $b) . PHP_EOL;