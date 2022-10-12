<?php
fscanf(STDIN, "%d", $N);
$arr = [];
for ($i = 0; $i < $N; $i++)
{
    fscanf(STDIN, "%d", $pi);
    array_push($arr,$pi);
}
rsort($arr);
$diff = null;
$lastVal = $arr[0];
for ($i = 1; $i < sizeof($arr); $i++) {
    $currentDiff = $lastVal - $arr[$i];
    if(is_null($diff) || $diff > $currentDiff){
        $diff = $currentDiff;
    }
    $lastVal = $arr[$i];
}
echo($diff."\n");
?>