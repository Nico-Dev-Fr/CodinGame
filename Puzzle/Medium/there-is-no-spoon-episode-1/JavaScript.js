var $arr = [];
const $width = parseInt(readline()); // the number of cells on the X axis
const $height = parseInt(readline()); // the number of cells on the Y axis
for (var $i = 0; $i < $height; $i++) {
    var $line = readline(); // width characters, each either 0 or .
    $arr[$i] = $line.split('');
}
for (var $i = 0; $i < $height; $i++)
{
    for (var $j = 0; $j < $width; $j++){
        if($arr[$i][$j] == '.') continue;

        var $rj = $ri = $bj = $bi = -1;

        for(var $ti=$i+1; $ti<$height; $ti++){
            if($arr[$ti][$j]=='0'){
                $bj = $j;
                $bi = $ti;
                break;
            }
        }

        for(var $tj=$j+1; $tj<$width; $tj++){
            if($arr[$i][$tj]=='0'){
                $rj = $tj;
                $ri = $i;
                break;
            }
        }


        // Three coordinates: a node, its right neighbor, its bottom neighbor
        console.log($j + ' ' + $i + ' ' + $rj + ' ' + $ri + ' ' + $bj + ' ' + $bi);
    }
}
