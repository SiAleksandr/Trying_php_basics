<?php

function power($val, int $pow) {
    if(($pow === 0) && ($val == 0)) {
        return "Результат получается неопределённым и лищённым смысла!";
    }
    if(($pow < 0) && ($val === 0)) {
        return "С числом '0' и отрицательным показателем степени действие невозможно!";
        //Потому что 'a' в степени 'n', где 'n' < 0 это 1 / 'a' в степени '-n'
        //и если 'a' = 0 , то будет деление на 0 
    }
    if(($val === 0) && ($pow > 0)) {
        return 0;
    }
    return number_to_power($val, $pow);
}

function number_to_power($val, int $pow) {
    if($pow < 0) {
        $pow = $pow * (-1);
        return 1 / (number_to_power($val, $pow));
    }
    if($pow === 0) {
        return 1;
    }
    if($pow === 1) {
        return $val * (number_to_power($val, 0)); 
    }
    $pow = $pow - 1;
    return $val * (number_to_power($val, $pow));
}

echo power(5, 3);