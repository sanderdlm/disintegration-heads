<?php

function loop()
{
	$file = 'count.txt';
	$decode = "lame --decode input.mp3";
	$encode = "lame --preset 128 --scale 1 input.wav input.mp3";

	exec($decode);
	exec($encode);
	unlink('input.wav');
	$currentIteration = file_get_contents($file);
	file_put_contents('count.txt', $currentIteration + 1);
}

for ($i=0; $i <= 250; $i++) { 
	loop();
}
