<?php
$colArr = [];
$subGridArr = [];
for ($i = 0; $i < 9; $i++)
{
    $inputs = explode(" ", fgets(STDIN));
    haveDuplicates($inputs);
    for ($j = 0; $j < 9; $j++)
    {   
        $n = intval($inputs[$j]);
        
        if(!array_key_exists($j,$colArr)) $colArr[$j] = [];
        array_push($colArr[$j], $n);

        $subGridIndex = getSquareIndex($i, $j);
        if(!array_key_exists($subGridIndex, $subGridArr)) $subGridArr[$subGridIndex] = [];
        array_push($subGridArr[$subGridIndex], $n);
    }
}
for ($i = 0; $i < sizeof($colArr); $i++)
{
    haveDuplicates($colArr[$i]);
}
for ($i = 0; $i < sizeof($subGridArr); $i++)
{
    haveDuplicates($subGridArr[$i]);
}
echo("true\n");

function getSquareIndex($rowIndex, $colIndex){
    return intval(floor($rowIndex / 3) * 3 + floor($colIndex / 3));
}
function haveDuplicates($arr){
    $res = array_unique($arr);
    if(sizeof($res) != sizeof($arr)){
        echo("false\n");
        exit();
    }
}
?>