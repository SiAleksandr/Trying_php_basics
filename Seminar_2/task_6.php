<?php

function caption_for_time_value(int $value, int $marker): string {
    // $marker = 0 для часов; $marker = 1 для минут
    if (($marker != 0) && ($marker != 1)) {
        return "";
    }
    $value = abs($value);
    if (($value % 10 >= 5) || (intdiv($value % 100,  10) === 1) || ($value % 10 === 0)) {
        $answer_set = "часов минут";
    }
    else if ($value % 10 === 1) {
        $answer_set = "час минута";
    }
    else {
        $answer_set = "часа минуты";
    }
    $answer_array = explode(" ", $answer_set);
    return $answer_array[$marker];
}

date_default_timezone_set("Europe/Moscow");
$hours = idate('H');
$minutes = idate('i');
echo $hours . " " . caption_for_time_value($hours, 0) . " ";
echo $minutes . " " . caption_for_time_value($minutes, 1);
