<?php

class DateFormatter{
    public static function formatISO8601($date){
        return DateTime::createFromFormat(DateTime::ISO8601, $date, new DateTimeZone('Asia/Jakarta'));
    }
}

?>
