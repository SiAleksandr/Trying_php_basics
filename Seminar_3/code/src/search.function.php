<?php

function getComponents(string $stringValue): array | bool {
    $components = explode(", ", $stringValue);
    if (isset($components) && count($components) === 2) {
        if (validateName($components[0]) && validateDate($components[1])) {

            return $components;
        }
    }
    return false;
}

function deleteFunction(array $config): string {
    $address = $config['storage']['address'];
    if(!(file_exists($address) && 
    is_readable($address) && is_writable($address))) {        
        return handleError("Файл не существует или недоступен");
    }
    $name = readline("Введите имя (можно отчество) и фамилию: ");

    if(!validateName($name)) {
        return handleError("Некорректное именование человека");
    }

    $newList = "";
    $linesToWrite = "";

    $file = fopen($address, 'r');

    while (($line = fgets($file)) !== false) {
        $components = getComponents($line);
        if(isset($components[0]) && $components[0] == $name) {
            $answer = readline($line . 
            "(чтобы оставить введите: О ) Чтобы удалить это нажмите <Enter>" . 
            PHP_EOL . "->: ");
            if ($answer == "") {
                $newList .= $line;
                continue;
            }
        }
        $linesToWrite .= $line;
    }

    fclose($file);

    if ($newList == "") {
        return "Ничего не найдено и не удалено";
    }

    $file = fopen($address, 'w');
    $result = "Удалено следующее:" . PHP_EOL . $newList;
    if(!fwrite($file, $linesToWrite)) {
        $result = handleError("Произошла ошибка записи. Данные потеряны");
    }
    fclose($file);
    return $result;
}

function checkingBirthdays(array $config): string {
    $address = $config['storage']['address'];
    if(!(file_exists($address) && is_readable($address))) {
        return handleError("Файл не существует или недоступен");
    }
    $diff = readline("В радиусе скольких дней посмотреть дни рождения?" . PHP_EOL . 
    "Если только сегодня, то введите: 0" . PHP_EOL . 
    "+/- дней: ");
    $result = browse($address, $diff);
    return $result;
}

function browse(string $placement, int $radius): string {
    $today = getDayOfYear(date("d-m-Y"));
    $front = $today + $radius;
    $back = $today - $radius;
    $those = "";
    $now = "";
    $source = fopen($placement, 'r');
    while (($infoItem = fgets($source)) !== false) {
        if(($currents = getComponents($infoItem)) !== false) {
            $one = getDayOfYear($currents[1]);
        
            if (($radius == 0) && ($one !== $today)) {
                continue;       
            }
            else if ($one == $today) {
                $now .= $infoItem;
                continue;
            }
            if ((($one >= $back) && ($one < $today)) || (($back <= 0) && ($one - 365 >=$back))) {
                $those .= "<прошедшее> " . $infoItem;
                continue;
            }
            if ((($one <= $front) && ($one > $today)) || (($front > 365) && ($one + 365 <=$front))) {
                $those .= $infoItem;
            }
        }
    }
    fclose($source);

    if($now === "") {
        $those .= "Сегодня нет дней рождения";
    } else {
        $those .= "Сегодня:" . PHP_EOL . $now;
    }
    return $those;
}

function getDayOfYear(string $date): int {
    $values = explode("-", $date);
    $day = $values[0];
    $month = $values[1];
    $dayNumber = 0;
    for($i = 1; $i <= $month - 1; $i++) {
        $dayNumber += 30;
        if(($i <= 7 && $i % 2 == 1) || ($i >= 8 && $i % 2 == 0)) {
            $dayNumber += 1;
        }
    }
    $dayNumber += $day;
    if($month > 2) {
        $dayNumber -= 2;
    }
    return $dayNumber;
}
  