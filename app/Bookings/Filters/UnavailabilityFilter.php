<?php

namespace App\Bookings\Filters;

use App\Bookings\Contracts\Filter;
use App\Bookings\TimeSlotGenerator;
use App\Models\ScheduleUnavailability;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Collection;

class UnavailabilityFilter implements Filter
{
    public function __construct(public Collection $unavailabilities)
    {
    }

    public function apply(TimeSlotGenerator $generator, CarbonPeriod $interval)
    {
        $interval->addFilter(function (Carbon $slot) use ($generator) {
            foreach ($this->unavailabilities as $unavailability) {
                $startTime = $unavailability->schedule->date->setTimeFrom($unavailability->start_time->subMinutes($generator->service->duration - $generator::INCREMENT));
                $endTime = $unavailability->schedule->date->setTimeFrom($unavailability->end_time->subMinutes($generator::INCREMENT));
                if ($slot->between($startTime, $endTime)) {
                    return false;
                }
            }

            return true;
        });

    }
}
