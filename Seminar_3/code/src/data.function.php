<?php
function validateDate(string $date): bool {
    $dateBlocks = explode("-", $date);

    if(!(isset($dateBlocks) && count($dateBlocks) === 3)) {
        return false;
    }
    $date = $dateBlocks[2]. "-" . $dateBlocks[1] . " " . $dateBlocks[0];

    if(!date_create_immutable($date)) {
        return false;
    }
    $targetDate = date_create_from_format("d-m-Y", $date);
    $currentDate = date_create_from_format("d-m-Y", date('d-m-Y'));
    if ($targetDate > $currentDate) {
        return false;
    }
    return true;
}
    

    // if(isset($dateBlocks[0]) && $dateBlocks[0] > 31) {
    //     return false;
    // }

    // if(isset($dateBlocks[1]) && $dateBlocks[0] > 12) {
    //     return false;
    // }

    // if(isset($dateBlocks[2]) && $dateBlocks[2] > date('Y')) {
    //     return false;
    // }

//   return true;
// }