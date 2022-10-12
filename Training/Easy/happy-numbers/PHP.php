<?php
fscanf(STDIN, "%d", $N);
for ($i = 0; $i < $N; $i++)
{
    $x = stream_get_line(STDIN, 128 + 1, "\n");
    $res = $x; $arr = [];
    while($res != 1){
        $res = sumOfSquare($res);
        if(in_array($res, $arr)){
            break;
        }
        array_push($arr,$res);
    }
    echo ($res == 1)?($x." :)\n"):($x." :(\n");
}


function sumOfSquare($n){
    $res = 0;
    $n = (string)$n;
    for($i=0;$i<strlen($n);$i++){
        $res += pow(intval($n[$i]),2);
    }
    return $res;
}
?>