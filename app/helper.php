<?php

namespace App;

class Helper
{
    const pt = ['Yearly', 'Semesters'];
    public static function getType()
    {
        return self::pt;
    }

    const sem = [
        'First Semester',
        'Second Semester',
        'Third Semester',
        'Fourth Semester',
        'Fifth Semester',
        'Sixth Semester',
        'Seventh Semester',
        'Eighth Semester'
    ];
    public static function getSem()
    {
        return self::sem;
    }

    const yrs = [
        'First Year',
        'Second Year',
        'Third Year',
        'Fourth Year'
    ];
    public function getYrs()
    {
        return self::yrs;
    }
}
