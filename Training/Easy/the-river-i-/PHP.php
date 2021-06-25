<?php
fscanf(STDIN, "%d", $r1);
fscanf(STDIN, "%d", $r2);
while($r1 != $r2){
    if($r1 < $r2){
        $r1 += getSeq($r1);
    }else{
        $r2 += getSeq($r2);
    }
}
echo($r1."\n");

function getSeq($r){
    $rSeq = 0;
    $rStr = (string)$r;
    for($i=0;$i<strlen($rStr);$i++){
        $rSeq += intval($rStr[$i]);
    }
    return $rSeq;
}
?>