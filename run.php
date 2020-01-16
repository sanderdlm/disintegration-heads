<?php

/*
 * Run this file on a cron just under the length of the song.
 */

function incrementCounter()
{
    $currentIteration = file_get_contents('count.txt');
    file_put_contents('count.txt', $currentIteration + 1);
}

function loop()
{
    $decode = "lame --decode src/input.mp3";
    $encode = "lame --preset 128 --scale 1 src/input.wav src/input.mp3";

    exec($decode);
    exec($encode);

    /* We have to manually clean up the input.wav file after encoding it again. */
    unlink('src/input.wav');

    /* Keep track of our iterations so we can display them on the page later */
    incrementCounter();
}