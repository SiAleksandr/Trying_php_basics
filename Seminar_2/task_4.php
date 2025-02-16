<?php

function change_letters(string $word): string {
    $alfabet = [
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya'
    ];
    $letters_array = mb_str_split($word);
    $result_word = "";
    for($i = 0; $i < count($letters_array); $i++) {
        $item = mb_strtolower($letters_array[$i]);
        if (array_key_exists($item, $alfabet) && ($item === $letters_array[$i])) {
            // ($item === $letters_array[i]) выполнится, если исходная буква маленькая
            $result_word = $result_word . $alfabet[$item];
        }
        else if (array_key_exists($item, $alfabet)) {
            // Сюда попадёт, толко если исходная буква большая
            $result_word = $result_word . ucfirst($alfabet[$item]);
            }
        else {
            $result_word = $result_word . $letters_array[$i];
        }
    }
    return $result_word;
}

echo change_letters("ВерблюжьяНотация.");

