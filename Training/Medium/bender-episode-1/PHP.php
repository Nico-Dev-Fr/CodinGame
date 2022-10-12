<?php
class Bender
{
    public $x = 0;
    public $y = 0;
    public $invert = false;
    public $beer = false;
    public $direction = 'SOUTH';
}
class Futurama{
    public $map = array();
    const DIRECTION_ARRAY = array(
        'SOUTH' => array('y'=> 1, 'x' => 0),
        'EAST' => array('y'=> 0, 'x' => 1),
        'NORTH' => array('y'=> -1, 'x' => 0),
        'WEST' => array('y'=> 0, 'x' => -1)
    );
    function getDirectionStr($y, $x) {
        $dir_arr = self::DIRECTION_ARRAY;
        foreach($dir_arr as $key => $direction){
            if ($dir_arr[$key]['y'] === $y && $dir_arr[$key]['x'] === $x){
                return $key;
            }
        }
    }
}


$benderMoveArr = [];
$teleporters = [];
$bender = new Bender();
$futurama = new Futurama();
fscanf(STDIN, "%d %d", $L, $C);
for ($i = 0; $i < $L; $i++)
{
    $row = stream_get_line(STDIN, 101 + 1, "\n");
    $futurama->map[$i] = $row;
    //error_log(var_export($row, true));
    
    for ($j = 0; $j < strlen($row); $j++){
        if($row[$j] == '@'){
            $bender->y = $i;
            $bender->x = $j;
        }
        if($row[$j] == 'T'){
            array_push($teleporters,['y' => $i, 'x' => $j]);
        }
    }
}
$i = 0;
while($futurama->map[$bender->y][$bender->x] !== '$'){
    $bX = $bender->x;
    $bY = $bender->y;
    switch ($futurama->map[$bY][$bX]) {
        case 'N':
            $bender->direction = "NORTH";
            break;

        case 'S':
            $bender->direction = "SOUTH";
            break;

        case 'E':
            $bender->direction = "EAST";
            break;

        case 'W':
            $bender->direction = "WEST";
            break;

        case 'I':
            //error_log(var_export("INVERT", true));
            $bender->invert = ($bender->invert)?false:true;
            break;

        case 'B':
            //error_log(var_export("BEER", true));
            $bender->beer = ($bender->beer)?false:true;
            break;

        case 'T':
            //error_log(var_export("TELEPORTATION", true));
            $teleportation = getTeleportation($teleporters, $bender);
            $bender->y = $teleportation['y'];
            $bender->x = $teleportation['x'];
            break;
    }
    //error_log(var_export($bender->direction, true));
    $moveStr = getBenderMove($futurama, $bender);
    array_push($benderMoveArr,$moveStr);
    
    $i ++;
    if($i == 1000){
        $benderMoveArr = [];
        echo("LOOP\n");
        break;
    }
}
foreach($benderMoveArr as $move){
    echo($move."\n");
}
function getBenderMove($futurama, $bender){
    error_log(var_export($futurama, true));
    error_log(var_export($bender, true));
    $directions_array = $futurama::DIRECTION_ARRAY;
    $curBenderDir = $directions_array[$bender->direction];
    $newBenderDir = $futurama->map[$bender->y + $curBenderDir['y']][$bender->x + $curBenderDir['x']];
    if(($newBenderDir == 'X' && $bender->beer == false) || $newBenderDir == '#'){

        $directions_array = getDirectionReverse($directions_array, $bender->invert);
        foreach($directions_array as $dir){
            $newBenderDir = $futurama->map[$bender->y + $dir['y']][$bender->x + $dir['x']];
            switch($newBenderDir)
            {
                case 'X':
                case '#':
                    //error_log(var_export("NEXT DIRECTION", true));
                    break;
                default:
                    $bender->y += $dir['y'];
                    $bender->x += $dir['x'];
                    $bender->direction = $futurama->getDirectionStr($dir['y'],$dir['x']);
                    //error_log(var_export($bender->direction, true));
                    return $bender->direction;
                    break;
            }
            
        }
    }
    else if($newBenderDir == 'X' && $bender->beer == true)
    {
        $futurama->map[$bender->y + $curBenderDir['y']][$bender->x + $curBenderDir['x']] = ' ';
    }

    $bender->y += $curBenderDir['y'];
    $bender->x += $curBenderDir['x'];
    return $futurama->getDirectionStr($curBenderDir['y'],$curBenderDir['x']);
}

function getDirectionReverse($directions_array, $isInvert){
    $directions = ($isInvert) ? array_reverse($directions_array) : $directions_array;
    return $directions;
}
function getTeleportation($teleporters, $bender){
    $key = ($teleporters[0]['y'] == $bender->y && $teleporters[0]['x'] == $bender->x) ? 1 : 0;
    return $teleporters[$key];
}

?>