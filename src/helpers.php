<?php

use Hekmatinasser\Jalali\Jalali;

if (! function_exists('jalali')) {
    /**
     * @param Jalali|DateTime|string|int|null $datetime
     * @param DateTimeZone|string|null $timezone
     * @return Jalali
     */
    function jalali(Jalali|DateTime|string|int|null $datetime = null, DateTimeZone|string|null $timezone = null)
    {
        return new Jalali($datetime, $timezone);
    }
}
