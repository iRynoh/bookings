<?php

namespace App\Bookings;

use App\Bookings\Contracts\Filter;
use App\Models\Schedule;
use App\Models\Service;
use Carbon\CarbonInterval;

class TimeSlotGenerator
{
    public const INCREMENT = 15;

    protected $interval;

    public function __construct(public Schedule $schedule, public Service $service)
    {
        $this->interval = CarbonInterval::minutes(self::INCREMENT)
                                        ->toPeriod(
                                            $schedule->date->setTimeFrom($schedule->start_time),
                                            $schedule->date->setTimeFrom(
                                                $schedule->end_time->subMinutes($service->duration)
                                            )
                                        );
    }

    public function applyFilters(array $filters)
    {
        foreach ($filters as $filter) {
            if (!$filter instanceof Filter){
                continue;
            }

            $filter->apply($this, $this->interval);
        }

        return $this;
    }

    public function get()
    {
        return $this->interval;

    }

}
