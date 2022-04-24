<?php

namespace Anet\App\Helpers;

class Timer
{
    public static function setSleep(int $sec, ?int $iterator = null, string $message = 'Wait...') : void
    {
        echo "Script fall asleep for $sec seconds\n";

        if ($iterator === null || ($sec / $iterator) <= 1) {
            sleep($sec);
            return;
        }

        $currentIteration = (int) ($sec / $iterator);
        $currentSec = $sec;

        for ($i = 0; $i <= $currentIteration; $i++, $currentSec -= $iterator) {
            if ($currentSec <= 0) {
                break;
            }

            $currentSleep = (($currentSec - $iterator) <= 0) ? $currentSec : $iterator;

            echo "Sleep $currentSleep sec. $message\n";
            sleep($currentSleep);
        }
    }
}
