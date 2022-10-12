<?php
fscanf(STDIN, "%d", $N);
$arr = [];
for ($i = 0; $i < $N; $i++)
{
    $line = stream_get_line(STDIN, 255 + 1, "\n");
    $arr[$i] = str_split($line);
}
for ($i = 0; $i < $N; $i++)
{   
    $count = 0;
    for ($j = 0; $j < sizeof($arr[$i]); $j++){
        if($arr[$i][$j]!='.'){
            $count ++;
            $j += 2;
        }
    }
    echo($count."\n");
}
?>