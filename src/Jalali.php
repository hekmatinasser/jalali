<?php

namespace Hekmatinasser\Jalali;

use DateTime;
use Hekmatinasser\Jalali\Traits\Date;

class Jalali extends DateTime implements JalaliInterface
{
    use Date;
}
