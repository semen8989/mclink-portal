<?php

namespace App\Traits;

trait YearRangeTrait {

    public function getYearRange($maxThreshold, $minThreshold, $year = null)
    {
        $currentYear = $year ?? date('Y');
        $yearRange = array();

        for ($yearIterator = $currentYear - $minThreshold; $yearIterator <= $currentYear + $maxThreshold; $yearIterator++) { 
            array_push($yearRange, $yearIterator);
        }

        return $yearRange;
    }
}