<?php
$arr = [];
fscanf(STDIN, "%d %d", $W, $H);
for ($i = 0; $i < $H; $i++)
{
    $line = stream_get_line(STDIN, 1024 + 1, "\n"); 
    error_log(var_export($line, true)); 
    $arr[$i] = $line;
}
$enter = explode('  ',$arr[0]);
$exit = explode('  ',$arr[$H-1]);
$content = [];
foreach($arr as $key => $value){
    $contentE = explode('|',$arr[$key]);
    if($key != 0 && $key != $H - 1){
        array_push($content,$contentE);
    }
}
foreach($enter as $key_enter => $value_enter){
    $key_exit = $key_enter;
    foreach($content as $value_content){
        if($value_content[$key_exit] == '--'){
            $key_exit --;
        }else if($value_content[$key_exit+1] == '--'){
            $key_exit ++;
        }
    }
    $value_exit = $exit[$key_exit];
    echo($value_enter.$value_exit."\n");
}
?>