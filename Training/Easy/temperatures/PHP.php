<?php
fscanf(STDIN, "%d", $n);
$inputs = explode(" ", fgets(STDIN));
$closest = 0;
for ($i = 0; $i < $n; $i++)
{
    $t = intval($inputs[$i]);
    if($closest === 0 || ($t > 0 && $t <= abs($closest)) || ($t < 0 && -$t < abs($closest) )){
        $closest = $t;
    }
}
echo($closest."\n");
?>