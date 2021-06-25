
const N = parseInt(readline());
for (let i = 0; i < N; i++) {
    const $x = readline();
    $res = $x; $arr = [];
    while($res != 1){
        $res = sumOfSquare($res);
        if($arr.includes($res)){
            break;
        }
        $arr.push($res);
    }
    ($res == 1)?console.log($x+" :)"):console.log($x+" :(");
}

function sumOfSquare($n){
    $res = 0;
    $n = $n.toString();
    for($i=0;$i<$n.length;$i++){
        $res += Math.pow(parseInt($n[$i]),2);
    }
    return $res;
}