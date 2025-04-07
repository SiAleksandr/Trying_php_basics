<?php

namespace Hwapp\Oop;

class App {

    public function __construct() {}

    public function run() {
        $f1 = new Fellow("Иван", "Иванов");
        $f2 = new Fellow("Катя", "Петрова");
        $f3 = new Fellow("Илья", "Ильичёв");
        $f4 = new Fellow("Ира", "Александрова");
        $f5 = new Fellow("Вася", "Михайлов");
        
        $arr1 = [$f1, $f2];

        $des1 = "Любители русского рока";

        $com1 = new Community($des1, $arr1);

        $v1 = new SimpleVinyl("Кино", "Звезда по имени солнце", 1989, "", true);

        echo $v1->showTheMain();
    }
}