<?php
fscanf(STDIN, "%d", $n);
$N = $n * $n;
for($i=1;$i<$N/2+1;$i++){
    $x = $n+$N/$i;
    $y = $n+$i;
    if($x < $y)
        break;
    if($N % $i == 0){
        echo("1/".$n." = 1/".$x." + 1/".$y."\n");
    }
}
?>