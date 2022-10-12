<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fscanf(STDIN, "%d", $N);
fscanf(STDIN, "%d", $C);
$b = $r = [];
for ($i = 0; $i < $N; $i++)
{
    fscanf(STDIN, "%d", $B);
    $b[$i] = $B;
}

error_log(var_export($b, true));
// Write an answer using echo(). DON'T FORGET THE TRAILING \n
// To debug: error_log(var_export($var, true)); (equivalent to var_dump)
if(array_sum($b) < $C) {
    echo("IMPOSSIBLE\n");
} else {
    sort($b);
    $avg = intval($C / $N);
    for ($i = 0; $i < $N; $i++)
    {
        $v = $b[$i];
        if($v <= $avg) {
            $r[$i] = $v;
        } else {
            $r[$i] = $avg;
        }
        $C -= $r[$i];

    }

    while($C > 0) {
        for ($j = $N-1; $j > 0; $j--)
        {
            if($r[$j] < $b[$j]) {
                $r[$j]++;
                $C--;
            }
            if($C == 0) break;
        }
    }


    foreach($r as $v) {
        echo($v."\n");
    }
}
?>