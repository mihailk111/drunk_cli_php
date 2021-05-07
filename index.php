<?php

require "./exTime.php";
require "./screen.php";

($programTimer = new exTime())->start();

$screen = new Screen();

$toggle = 1;

$counter=0;

$steps = 6000;
$counter_changed = false;
$frames_amount = 3000;

while(true)
{

    // if ($counter > 1000 && !$counter_changed ) { 
    //     $steps += 1000;
    //     $counter_changed = true;
    // }

    if ($counter > $frames_amount) break;

    $screen->clear();

    for ($step=0; $step < $steps; $step++) { 
        $screen->write(".");
    }


    $counter++;
}

$programTimer->end();
$timesec = $programTimer->seconds();
$fps = $frames_amount / $timesec;

echo "ex time (sec): $timesec \n";
echo "fps: $fps\n";