<?php
fscanf(STDIN, "%d", $N);
fscanf(STDIN, "%d", $L);
$arr = [];
for ($i = 0; $i < $N; $i++)
{   
    $arr[$i] = explode(" ", str_replace(["\n","\r"],"",fgets(STDIN)));
}
    error_log(var_export($arr, true));
for ($i = 0; $i < $N; $i++)
{   
    for ($j = 0; $j < $N; $j++)
    {   
        if($arr[$i][$j] == "C"){
            for ($k = $L - 1; $k > 0; $k--)
            {
                $arr = getLightCandle($arr,[$i,$j,$k,$L]);
            }
            $arr[$i][$j] = $L;
        }
    }
}

function getLightCandle($arr,$data){
    $r = $data[3] - $data[2]; 
    $iFrom = $data[0] - $r;
    $iTo = $data[0] + $r;
    $jFrom = $data[1] - $r;
    $jTo = $data[1] + $r;
    for ($i = $iFrom; $i <= $iTo; $i++)
    {   
        for ($j = $jFrom; $j <= $jTo; $j++)
        {  
            if(array_key_exists($i,$arr) && array_key_exists($j,$arr[$i]) && $arr[$i][$j]=='X'){
                $arr[$i][$j] = $data[2]; 
            }
        }
    }
    return $arr;
}

$count = 0;
foreach($arr as $a){
    $b = implode(' ', $a);
    $count += substr_count($b, 'X');
}

echo($count."\n");
?>