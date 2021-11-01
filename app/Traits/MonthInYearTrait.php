<?php

namespace App\Traits;

trait MonthInYearTrait {

    public static $monthList = [        
        1 => 'January',
        2 => 'February',
        3 => 'March',
        4 => 'April',
        5 => 'May',
        6 => 'June',
        7 => 'July',
        8 => 'August',
        9 => 'September',
        10 => 'October',
        11 => 'November',
        12 => 'December'
    ];

    public function getStringMonth($month)
    {
        return $this->monthList[$month];
    }

    public function getNumericMonth($month)
    {
        return array_search($month, $this->monthList);
    }
}