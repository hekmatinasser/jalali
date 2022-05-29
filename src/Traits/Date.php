<?php

namespace Hekmatinasser\Jalali\Traits;

use Hekmatinasser\Jalali\JalaliInterface;

trait Date
{
    use Accessor;
    use Comparison;
    use Creator;
    use Formatting;
    use Modification;
    use Transformation;
    use Translator;
    use Boundaries;
    use Difference;
    /**
     * Format to use for __toString.
     *
     * @var string
     */
    protected static $stringFormat = JalaliInterface::DEFAULT_STRING_FORMAT;

    /**
     * First day of week.
     *
     * @var int
     */
    protected static $weekStartsAt = JalaliInterface::SATURDAY;

    /**
     * Last day of week.
     *
     * @var int
     */
    protected static $weekEndsAt = JalaliInterface::FRIDAY;

    /**
     * Days of weekend.
     *
     * @var array
     */
    protected static $weekendDays = [JalaliInterface::THURSDAY, JalaliInterface::FRIDAY];

    /**
     * number day in months gregorian
     *
     * @var array
     */
    protected static $daysMonthGregorian = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

    /**
     * number day in month jalali
     *
     * @var array
     */
    protected static $daysMonthJalali = [31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29];
}
