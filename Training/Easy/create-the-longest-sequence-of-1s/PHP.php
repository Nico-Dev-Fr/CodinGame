<?php
$b = stream_get_line(STDIN, 999 + 1, "\n");
$last = null;
$seq = 0;
$maxS = 0;
for($i=0;$i<strlen($b);$i++){
    switch($b[$i]){
        case '0':
            if($last<$i && !is_null($last)){
                $seq = $i - ($last + 1);
            }
            $seq ++;
            $last = $i;
            break;
        case '1':
            $seq ++;
            break;
        default:
            $seq = 0;
            break;
    }
     
    if($seq > $maxS)
        $maxS = $seq;
}
echo($maxS);
?>