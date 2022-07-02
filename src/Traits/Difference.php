<?php

namespace Hekmatinasser\Jalali\Traits;

use Exception;
use Hekmatinasser\Jalali\Jalali;

trait Difference
{
    /**
     * Get the difference in years
     *
     * @param Jalali|null $datetime
     * @return int
     * @throws Exception
     */
    public function diffYears(Jalali $datetime = null): int
    {
        $datetime = $datetime ?: new self();

        return (int) $this->diff($datetime->datetime())->format('%r%y');
    }

    /**
     * Get the difference in months
     *
     * @param Jalali|null $datetime
     * @return int
     * @throws Exception
     */
    public function diffMonths(Jalali $datetime = null): int
    {
        $datetime = $datetime ?: new self();

        return $this->diffYears($datetime) * static::MONTHS_PER_YEAR + (int) $this->diff($datetime->datetime())->format('%r%m');
    }

    /**
     * Get the difference in weeks
     *
     * @param Jalali|null $datetime
     * @return int
     * @throws Exception
     */
    public function diffWeeks(Jalali $datetime = null): int
    {
        return (int) ($this->diffDays($datetime) / static::DAYS_PER_WEEK);
    }

    /**
     * Get the difference in days
     *
     * @param Jalali|null $datetime
     * @return int
     * @throws Exception
     */
    public function diffDays(Jalali $datetime = null): int
    {
        $datetime = $datetime ?: new self();

        return (int) $this->diff($datetime->datetime())->format('%r%a');
    }

    /**
     * Get the difference in hours
     *
     * @param Jalali|null $datetime
     * @return int
     */
    public function diffHours(Jalali $datetime = null): int
    {
        return (int) ($this->diffSeconds($datetime) / static::SECONDS_PER_MINUTE / static::MINUTES_PER_HOUR);
    }

    /**
     * Get the difference in minutes
     *
     * @param Jalali|null $datetime
     * @return int
     */
    public function diffMinutes(Jalali $datetime = null): int
    {
        return (int) ($this->diffSeconds($datetime) / static::SECONDS_PER_MINUTE);
    }

    /**
     * Get the difference in seconds
     *
     * @param Jalali|null $datetime
     *
     * @return int
     */
    public function diffSeconds(Jalali $datetime = null): int
    {
        $datetime = $datetime ?: static::now($this->getTimezone());

        return $datetime->getTimestamp() - $this->getTimestamp();
    }
}
