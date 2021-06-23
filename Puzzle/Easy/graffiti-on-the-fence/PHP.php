<?php
fscanf(STDIN, "%d", $L);
fscanf(STDIN, "%d", $N);
$arr[0] = [0,$L];
for ($i = 0; $i < $N; $i++)
{
    fscanf(STDIN, "%d %d", $st, $ed);    
    foreach($arr as $key => $val){
        if($st <= $val[0] && $ed >= $val[1]){
            unset($arr[$key]);
        }
        else if($st > $val[0] && $ed < $val[1]){
            unset($arr[$key]);
            array_push($arr,[$val[0], $st]);
            array_push($arr,[$ed, $val[1]]);
        }
        else{
            if($val[0] < $ed && $ed < $val[1]){
                $arr[$key][0] = $ed; 
            }
            if($val[0] < $st && $st < $val[1]){
                $arr[$key][1] = $st; 
            }
        }
    }
}
sort($arr);
if(sizeof($arr) !== 0){
    foreach($arr as $val){
        echo(join(" ",$val)."\n");
    }
}else{
    echo("All painted\n");
}
?>