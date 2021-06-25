<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

// $W: width of the building.
// $H: height of the building.
fscanf(STDIN, "%d %d", $W, $H);
// $N: maximum number of turns before game over.
fscanf(STDIN, "%d", $N);
fscanf(STDIN, "%d %d", $x, $y);

$x1 = 0;
$x2 = $W - 1;
$y1 = 0;
$y2 = $H - 1;

// game loop
while (TRUE)
{
    fscanf(STDIN, "%s", $bombDir);
    if(strpos($bombDir,'D') !== false){
        $y1 = $y + 1;
    }else if(strpos($bombDir,'U') !== false){
        $y2 = $y - 1;
    }
    if(strpos($bombDir,'R') !== false){
        $x1 = $x + 1;
    }else if(strpos($bombDir,'L') !== false){
        $x2 = $x - 1;
    }
    $x = intval($x1 + ($x2 - $x1) / 2);
    $y = intval($y1 + ($y2 - $y1) / 2);
    echo $x.' '.$y."\n";
}
?>