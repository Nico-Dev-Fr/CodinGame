const $N = parseInt(readline());
const $L = parseInt(readline());
$arr = [];
for (let $i = 0; $i < $N; $i++) {
    $arr[$i] = readline().split(' ');
}
for (let $i = 0; $i < $N; $i++)
{   
    for (let $j = 0; $j < $N; $j++)
    {   
        if($arr[$i][$j] == "C"){
            for ($k = $L - 1; $k > 0; $k--)
            {
                $arr = getLightCandle($arr,[$i,$j,$k,$L]);
            }
            $arr[$i][$j] = $L;
        }
    }
}

function getLightCandle($arr,$data){
    $r = $data[3] - $data[2]; 
    $iFrom = $data[0] - $r;
    $iTo = $data[0] + $r;
    $jFrom = $data[1] - $r;
    $jTo = $data[1] + $r;
    for (let $i = $iFrom; $i <= $iTo; $i++)
    {   
        for (let $j = $jFrom; $j <= $jTo; $j++)
        {  
            if($arr.hasOwnProperty($i) && $arr[$i].hasOwnProperty($j) && $arr[$i][$j]=='X'){
                $arr[$i][$j] = $data[2]; 
            }
        }
    }
    return $arr;
}

console.error($arr);
$count = 0;
$arr.forEach(function($a){
    $b = $a.join(' ');
    $count += ($b.match(/\X/g) || []).length;
});

console.log($count);