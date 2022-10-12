<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/
$arr = [];
$storedCount = 0;

fscanf(STDIN, "%d", $N);
for ($i = 0; $i < $N; $i++)
{
    fscanf(STDIN, "%s", $tel);
    array_push($arr, $tel);
}

$arr = array_unique($arr);
sort($arr);

// error_log(var_export($arr, true));

for ($i = 0; $i < sizeof($arr); $i++)
{
    $storedCount += strlen($arr[$i]);
    $storedCount -= findValue($arr, $i);
    // error_log(var_export('--- '.findValue($arr, $i), true));
    // error_log(var_export($arr[$i], true));
}

echo($storedCount."\n");

function findValue($arr, $k){
    $tmpCount = 0;
    $thisTel = str_split($arr[$k]);
    $filtered = array_filter($arr, function($val) use (&$thisTel){
        return $val[0] == $thisTel[0];
    }, ARRAY_FILTER_USE_BOTH);

    error_log(var_export('+++ '.sizeof($filtered), true));
    error_log(var_export($filtered, true));
    
    for ($j = $k - 1; $j > - 1; $j--)
    {   
        $count = 0;
        $telCompare = str_split($arr[$j]);
        if($telCompare[0] == $thisTel[0]){
            for ($l = 0; $l < strlen($arr[$k]); $l++)
            {   
                if(array_key_exists($l,$telCompare)){
                    if($thisTel[$l] == $telCompare[$l]){
                        $count ++;
                        if($tmpCount == 0 || $count > $tmpCount){
                            $tmpCount = $count;
                        }
                    }else{
                        break;
                    }
                }else{
                    break;
                }
            }
        }
    }
    return $tmpCount;
}
?>