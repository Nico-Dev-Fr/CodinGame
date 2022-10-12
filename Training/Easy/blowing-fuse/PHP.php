<?php
$thisC = 0;
$maxC = 0;
$lights_arr = [];
fscanf(STDIN, "%d %d %d", $n, $m, $c);
$inputs = explode(" ", fgets(STDIN));
for ($i = 0; $i < $n; $i++)
{
    $nx = intval($inputs[$i]);
    $lights_arr[$i] = [$nx, false];
}
$inputs = explode(" ", fgets(STDIN));
for ($i = 0; $i < $m; $i++)
{
    $mx = intval($inputs[$i]) - 1;
    $lightC = $lights_arr[$mx][0];
    switch($lights_arr[$mx][1]){
        case true:
        $thisC -= $lightC;
        $lights_arr[$mx][1] = false;
        break;
        case false:
        $thisC += $lightC;
        $lights_arr[$mx][1] = true;
        break;
    }
    $maxC = ($thisC > $maxC)? $thisC : $maxC;

    if($thisC > $c){
        break;
    }
}
if($maxC < $c){
    echo("Fuse was not blown.\n");
    echo("Maximal consumed current was ".$maxC." A.\n");
}else{
    echo("Fuse was blown.\n");
}
?>