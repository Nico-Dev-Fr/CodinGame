<?php

fscanf(STDIN, "%d", $N);

$map = new Map();
for ($i = 0; $i < $N; $i++)
{   
    $line = stream_get_line(STDIN, 256 + 1, "\n");
    $explode = explode(' ',$line);
    $room = new Room();
    $room->money = $explode[1];
    $room->door1 = $explode[2];
    $room->door2 = $explode[3];
    $map->rooms[$i] = $room;
}
$best_money = getBestRoomMoney($map,0);
echo($best_money."\n");

function getBestRoomMoney($map, $id){
    if(isset($map->best[$id])){
        return $map->best[$id];
    }else{
        $room = $map->rooms[$id];
        $money_1 = $money_2 = 0;
        if($room->door1 == 'E'){
            $money_1 = $room->money;
        }else{
            $money_1 = $room->money + getBestRoomMoney($map, $room->door1);
        }

        if($room->door2 == 'E'){
            $money_2 = $room->money;
        }else{
            $money_2 = $room->money + getBestRoomMoney($map, $room->door2);
        }

        $best_money = ($money_1 > $money_2)? $money_1:$money_2;
        $map->best[$id] = $best_money;
        return $best_money;
    }    
}

class Map{
    public $rooms = [];
    public $best = [];
}
class Room
{
    public $money;
    public $door1;
    public $door2;
}
?>