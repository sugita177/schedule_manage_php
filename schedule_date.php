<?php

class ScheduleDate 
{
    const MAX_DAYS = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    const DAYS_OF_WEEK_JPN = ['日', '月', '火', '水', '木', '金', '土'];

    private $year;
    private $month;

    function __construct($year, $month)
    {
     $this->year = $year;
     $this->month = $month;
    }

    public function getYear() {
        return $this->year;
    }

    public function getMonth() {
        return $this->month;
    }

    private function isLeapYear($year_){
        if($year_%4 === 0 && !($year_%100 === 0 || $year_%4 !== 0)) {
            return true;
        } else {
            return false;
        }
    }

    public function getDaysPerMonth() {
        if($this->month === 2 && $this->isLeapYear($this->year) === true) {
            return 29;
        }
        return self::MAX_DAYS[$this->month - 1];
    }

    public function getDayOfWeek($day) {
        $timestamp = mktime(0, 0, 0, $this->month, $day, $this->year);
        $date = date('w', $timestamp);
        return self::DAYS_OF_WEEK_JPN[$date];
    }
}