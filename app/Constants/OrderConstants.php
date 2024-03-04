<?php

namespace App\Constants;

class OrderConstants
{
    const BREAKFAST = 'Breakfast';
    const LUNCH = 'Lunch';
    const DINNER = 'Dinner';

    const MEALS = [
        'breakfast' => self::BREAKFAST,
        'lunch' => self::LUNCH,
        'dinner' => self::DINNER
    ];
}
