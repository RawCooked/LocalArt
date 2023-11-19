<?php
function formaterDate($date) {
    $dateTime = new DateTime($date);
    $heureMinute = $dateTime->format('H:i A');
    return $heureMinute;
}
function aouc($type)
{
    if ($type == 'a') {
        return "artiste";
    }
    else if ($type == 'c')
    {
        return "client";
    }
}
?>