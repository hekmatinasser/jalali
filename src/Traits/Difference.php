<?php

namespace Hekmatinasser\Jalali\Traits;

use Hekmatinasser\Jalali\Jalali;

trait Difference
{
    /**
     * Get the difference in years
     *
     * @param Jalali|null $v
     *
     * @return int
     */
    public function diffYears(Jalali $v = null)
    {
        $v = $v ?: static::now($this->getTimezone());

        return (int) $this->diff($v->datetime())->format('%r%y');
    }

    /**
     * Get the difference in months
     *
     * @param Jalali|null $v
     *
     * @return int
     */
    public function diffMonths(Jalali $v = null)
    {
        $v = $v ?: static::now($this->getTimezone());

        return $this->diffYears($v) * static::MONTHS_PER_YEAR + (int) $this->diff($v->datetime())->format('%r%m');
    }

    /**
     * Get the difference in weeks
     *
     * @param Jalali|null $v
     *
     * @return int
     */
    public function diffWeeks(Jalali $v = null)
    {
        return (int) ($this->diffDays($v) / static::DAYS_PER_WEEK);
    }

    /**
     * Get the difference in days
     *
     * @param Jalali|null $v
     *
     * @return int
     */
    public function diffDays(Jalali $v = null)
    {
        $v = $v ?: static::now($this->getTimezone());

        return (int) $this->diff($v->datetime())->format('%r%a');
    }

    /**
     * Get the difference in hours
     *
     * @param Jalali|null $v
     *
     * @return int
     */
    public function diffHours(Jalali $v = null)
    {
        return (int) ($this->diffSeconds($v) / static::SECONDS_PER_MINUTE / static::MINUTES_PER_HOUR);
    }

    /**
     * Get the difference in minutes
     *
     * @param Jalali|null $v
     *
     * @return int
     */
    public function diffMinutes(Jalali $v = null)
    {
        return (int) ($this->diffSeconds($v) / static::SECONDS_PER_MINUTE);
    }

    /**
     * Get the difference in seconds
     *
     * @param Jalali|null $v
     *
     * @return int
     */
    public function diffSeconds(Jalali $v = null)
    {
        $v = $v ?: static::now($this->getTimezone());

        return $v->getTimestamp() - $this->getTimestamp();
    }
}
