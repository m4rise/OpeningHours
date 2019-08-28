<?php

namespace App\Classes;

class Day
{
    public const MONDAY = 1;
    public const TUESDAY = 2;
    public const WEDNESDAY = 3;
    public const THURSDAY = 4;
    public const FRIDAY = 5;
    public const SATURDAY = 6;
    public const SUNDAY = 7;

    public static function getWeekDays()
    {
        return [
            self::MONDAY => 'lundi',
            self::TUESDAY => 'mardi',
            self::WEDNESDAY => 'mercredi',
            self::THURSDAY => 'jeudi',
            self::FRIDAY => 'vendredi',
            self::SATURDAY => 'samedi',
            self::SUNDAY => 'dimanche'
        ];
    }
}
