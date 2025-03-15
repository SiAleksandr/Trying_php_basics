<?php

// function validateDate(string $date): bool {

//     $dateBlocks = explode("-", $date);
    
//     if(isset($dateBlocks[0]) && $dateBlocks[0] > 31) {
//         return false;
//     }

//     if(isset($dateBlocks[1]) && $dateBlocks[0] > 12) {
//         return false;
//     }

//     if(isset($dateBlocks[2]) && $dateBlocks[2] > date('Y')) {
//         return false;
//     }

//   return true;
// }

function validateDate(string $date): bool {
// При проверке месяца у меня получалось, что 3 > 12 давло true,
// а это 3-й месяц, который сейчас(15.03.2025) на календаре
// и я переделал этот метод так, чтобы 3 < 12 давало true    
    $date = trim($date, PHP_EOL);
    $dateBlocks = explode("-", $date);

    $limits = [31, 12];
    $curYear = date('Y');
    $limits[2] = $curYear;

    $signal = 0;
    if(count($dateBlocks) === 3) {
        for($i = 0; $i < 3; $i++) {
            if($dateBlocks[$i] <= $limits[$i]) {
                $signal += 1;
            }
        }
        if($signal == 3) {
            return true;
        }
    }
    return false;
}

function validateName(string $note): bool {
    $nameValues = explode(" ", $note);
    if (!isset($nameValues) || (count($nameValues) < 2 || count($nameValues) > 3)) {
        return false;
    }
    return true;
}

