<?php
fscanf(STDIN, "%d", $width);
fscanf(STDIN, "%d", $height);
$arr = [];
for ($i = 0; $i < $height; $i++)
{
    $line = stream_get_line(STDIN, 31 + 1, "\n");
    $arr[$i] = [];
    for ($j = 0; $j < $width; $j++){
        array_push($arr[$i],$line[$j]);
    }
}

for ($i = 0; $i < $height; $i++)
{
    for ($j = 0; $j < $width; $j++){
        if($arr[$i][$j] == '.') continue;

        $rj = $ri = $bj = $bi = -1;
        for($tj=$j+1; $tj<$width; $tj++){
            if($arr[$i][$tj]=='0'){
                $rj = $tj;
                $ri = $i;
                break;
            }
        }

        for($ti=$i+1; $ti<$height; $ti++){
            if($arr[$ti][$j]=='0'){
                $bj = $j;
                $bi = $ti;
                break;
            }
        }

        // Three coordinates: a node, its right neighbor, its bottom neighbor
        echo"$j $i $rj $ri $bj $bi\n";   
    }
}

?>