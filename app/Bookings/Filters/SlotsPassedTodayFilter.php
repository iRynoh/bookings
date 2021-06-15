<?php

namespace App\Bookings\Filters;

use App\Bookings\Contracts\Filter;
use App\Bookings\TimeSlotGenerator;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class SlotsPassedTodayFilter implements Filter
{
    public function apply(TimeSlotGenerator $generator, CarbonPeriod $interval)
    {
        $interval->addFilter(function (Carbon $slot) use ($generator) {
            if ($generator->schedule->date->isToday()) {
                if ($slot->lt(now())) {
                    return false;
                }
            }

            return true;
        });
    }
}
