<?php

namespace App\Helpers;

use Illuminate\Support\Str;

abstract class Helper
{
    /**
     * Generate Random String
     *
     * @param $length
     *
     * @return string
     */
    public static function STR_RANDOM($length)
    {
        return Str::random($length);
    }
}
