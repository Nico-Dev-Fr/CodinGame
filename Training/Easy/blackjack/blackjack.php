<?php
$b = stream_get_line(STDIN, 100 + 1, "\n");
$p = stream_get_line(STDIN, 100 + 1, "\n");
error_log(var_export($b, true));
error_log(var_export($p, true));

$s = array('/J/', '/Q/', '/K/');
$b = preg_replace($s, 10, $b);
$p = preg_replace($s, 10, $p);

$sb = substr_count($b, ' ') + 1;
$sp = substr_count($p, ' ') + 1;

$b = getSum($b);
$p = getSum($p);

switch(true) {
    case $p == 21 && $sp < $sb:
        echo("Blackjack!\n");
        break;
    case ($b > $p && $b < 21) || $p > 21 || ($b == 21 && $p != 21):
        echo("Bank\n");
        break;
    case $b == $p:
        echo("Draw\n");
        break;
    case ($b < $p && $p < 21) || $b > 21:
        echo("Player\n");
        break;
}

function getSum($v) : int
{
    $i = substr_count($v, 'A');
    $x = preg_replace('/A/', 11, $v);
    $r = array_sum(explode(' ', $x));
    if($i != 0) {
        $c = 1;
        while($r > 21 && $c != $i + 1) {
            $x = preg_replace('/A/', 1, $v, $c);
            $r = array_sum(explode(' ', $x));
            $c ++;
        }
    }
    return $r;
}
?>