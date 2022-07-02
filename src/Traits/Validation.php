<?php

namespace Hekmatinasser\Jalali\Traits;

use Hekmatinasser\Jalali\Exceptions\InvalidUnitException;
use JetBrains\PhpStorm\Pure;

trait Validation
{
    /**
     * check jalali the instance is a leap year
     *
     * @param int $year
     * @return bool
     */
    public static function isLeapYear(int $year): bool
    {
        return in_array(($year % 33), [1 , 5 , 9 , 13 ,17 , 22 , 26 , 30]);
    }

    /**
     * validate a jalali date
     *
     * @param int $month
     * @param int $day
     * @param int $year
     * @return bool
     */
    #[Pure]
 public static function isValidDate(int $year, int $month, int $day): bool
 {
     if ($year < 0) {
         return false;
     }
     if ($month < 1 || $month > 12) {
         return false;
     }
     $dayLastMonthJalali = static::isLeapYear($year) && ($month == 12) ? 30 : static::$daysMonthJalali[$month - 1];
     if ($day < 1 || $day > $dayLastMonthJalali) {
         return false;
     }

     return true;
 }

    /**
     * validate a time
     *
     * @param int $hour
     * @param int $minute
     * @param int $second
     * @param int $micro
     * @return bool
     */
    public static function isValidTime(int $hour, int $minute, int $second, int $micro = 0): bool
    {
        return $hour >= 0 && $hour <= 23
            && $minute >= 0 && $minute <= 59
            && $second >= 0 && $second <= 59
            && $micro >= 0 && $micro <= 999999;
    }

    /**
     * valid year jalali
     *
     * @param int $value
     */
    public static function validYear(int $value)
    {
        if ($value < 0) {
            throw new InvalidUnitException('year', $value);
        }
    }

    /**
     * valid mount jalali
     *
     * @param int $value
     */
    public static function validMount(int $value)
    {
        if ($value < 1 || $value > 12) {
            throw new InvalidUnitException('month', $value);
        }
    }

    /**
     * valid day jalali
     *
     * @param int $year
     * @param int $month
     * @param int $day
     * @param string $unit
     */
    public static function validDay(int $year, int $month, int $day, string $unit = 'day')
    {
        $dayLastMonthJalali = (static::isLeapYear($year) && $month == 12) ? 30 : static::$daysMonthJalali[$month - 1];
        if ($day < 1 || $day > $dayLastMonthJalali) {
            throw new InvalidUnitException($unit, $day);
        }
    }

    /**
     * valid hour jalali
     *
     * @param int $value
     */
    public static function validHour(int $value)
    {
        if ($value < 0 || $value > 23) {
            throw new InvalidUnitException('hour', $value);
        }
    }

    /**
     * valid minute jalali
     *
     * @param int $value
     */
    public static function validMinute(int $value)
    {
        if ($value < 0 || $value > 59) {
            throw new InvalidUnitException('minute', $value);
        }
    }

    /**
     * valid second jalali
     *
     * @param int $value
     */
    public static function validSecond(int $value)
    {
        if ($value < 0 || $value > 59) {
            throw new InvalidUnitException('second', $value);
        }
    }

    /**
     * valid micro jalali
     *
     * @param int $value
     */
    public static function validMicro(int $value)
    {
        if ($value < 0 || $value > 999999) {
            throw new InvalidUnitException('micro', $value);
        }
    }

    /**
     * valid date jalali
     *
     * @param int $year
     * @param int $month
     * @param int $day
     */
    public static function validDate(int $year, int $month, int $day)
    {
        self::validYear($year);
        self::validMount($month);
        self::validDay($year, $month, $day);
    }

    /**
     * valid time
     *
     * @param int $hour
     * @param int $minute
     * @param int $second
     * @param int $micro
     */
    public static function validTime(int $hour, int $minute, int $second, int $micro = 0)
    {
        self::validHour($hour);
        self::validMinute($minute);
        self::validSecond($second);
        if ($micro) {
            self::validMicro($micro);
        }
    }

    /**
     * valid time
     *
     * @param int $year
     * @param int $month
     * @param int $day
     * @param int $hour
     * @param int $minute
     * @param int $second
     * @param int $micro
     */
    public static function validDateTime(int $year, int $month, int $day, int $hour, int $minute, int $second, int $micro = 0)
    {
        self::validDate($year, $month, $day);
        self::validTime($hour, $minute, $second, $micro);
    }
}
