<?php
fscanf(STDIN, "%d", $speed);
fscanf(STDIN, "%d", $lightCount);
$lights = [];

for ($i = 0; $i < $lightCount; $i++)
{
    fscanf(STDIN, "%d %d", $distance, $duration);
    array_push($lights, [$distance, $duration]);
}
for ($i = 0; $i < $lightCount; $i++)
{    
    if (isRed($speed, $lights[$i][0], $lights[$i][1])) {
        $speed--;
        $i = -1;
    }
}
echo($speed."\n");

function isRed($speed, $dist, $dur){
    $res = (18 * $dist) % (10 * $speed * $dur) >= (5 * $speed * $dur);
    return $res;
}
?>