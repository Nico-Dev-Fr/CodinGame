<?php
fscanf(STDIN, "%d", $tributes);
$arr = [];
for ($i = 0; $i < $tributes; $i++)
{
    $playerName = stream_get_line(STDIN, 100 + 1, "\n");
    $arr[$playerName] = ['Killed'=>['None'],'Killer'=>'Winner'];
}
ksort($arr);
fscanf(STDIN, "%d", $turns);
for ($i = 0; $i < $turns; $i++)
{
    $info = explode(' killed ',stream_get_line(STDIN, 100 + 1, "\n"));
    $infoK = explode(', ',$info[1]);

    if(array_key_exists($info[0],$arr)){
        if($arr[$info[0]]['Killed'][0] == 'None'){
            $arr[$info[0]]['Killed'] = []; 
        }
        foreach($infoK as $value){
            array_push($arr[$info[0]]['Killed'],$value);
        }
    }

    foreach($infoK as $value){
        if(array_key_exists($value,$arr)){
            $arr[$value]['Killer'] = $info[0]; 
        }
    }
}

$i = 0;
$numItems = count($arr);
foreach($arr as $name => $item) {
    asort($item['Killed']);
    $killed = implode(', ',$item['Killed']);
    $killer = $item['Killer'];

    echo("Name: ".$name."\n");
    echo("Killed: ".$killed."\n");
    echo("Killer: ".$killer."\n");

    if(++$i !== $numItems) {
        echo("\n");
    }
}
?>