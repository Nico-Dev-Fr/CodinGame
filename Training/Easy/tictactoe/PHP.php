<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/
public $arr = [];
$haveWin = false;
error_log(var_export('LINES => ', true));
for ($i = 0; $i < 3; $i++)
{
    $l = stream_get_line(STDIN, 3 + 1, "\n");
    error_log(var_export($l, true));
    $arr[$i] = str_split($l);
}


for ($i = 0; $i < 3; $i++)
{
    $row = $arr[$i];
    $column = array_column($arr, $i);
    setArray($arr[$i], function($haveWin, $key) use ($arr, $i){
        if($haveWin){
            $this->arr[$i][$key[0]] = 'O';
        }
    });
    setArray($column, function($haveWin, $key) use ($arr, $i){
        if($haveWin){
            $this->$arr[$key[0]][$i] = 'O';
        }
    });
}
$diagonals = getDiagonalValues($arr);
foreach($diagonals as $keyR => $row){
       setArray($row,  function($haveWin, $key) use ($arr, $i){
        if($haveWin){
            $this->$arr[$key[0]][$key[1]] = 'O';
        }
    });
}
if($haveWin){
    for ($i = 0; $i < 3; $i++)
    {
        echo implode('',$arr[$i])."\n";
    }
}else{
    echo "false\n";
}
function setArray($arr, $callback){
    $count = [0,0];
    foreach($arr as $key => $val){
        if($val=='O')
            $count[0]++;
        if($val == '.') 
            $count[1]++;

        $dKey = 0;
        if(is_array($val)){
            $dKey = $val[1];
        }
        ($count[0] == 2 && $count[1] == 1)? $callback(true, [$key,$dKey]) : $callback(false,[$key,$dKey]);
    }
}
// function setArray($arr, $data){
//     foreach($data as $keyR => $row){
//         $count = [0,0];
//         foreach($row as $key => $val){
//             if($val[0]=='O')
//                 $count[0]++;
//             if($val[0] == '.') 
//                 $count[1]++;
            
            
//             if($count[0] == 2 && $count[1] == 1){
//                 $arr[$key][$val[1]] = 'O';
//                 return $arr;
//             }
//         }
//     }
// }

function getDiagonalValues($arr) {
    $diag_arr = [];
    $length = count($arr);
    foreach($arr as $key => $value) {
        $diag_arr[0][] = [$value[$key], $key];
        $diag_arr[1][] = [$value[($length-$key-1)], ($length-$key-1)];
    }
    return $diag_arr;
}
?>