<?php

namespace App\Helpers;

class AndresReyesDev
{
    public static function steps() {
        $steps = [];
        for ($i = 0; $i < 5; $i++) {
            $steps[] = rand(1, 100);
        }
        return $steps;
    }
}
