const $L = parseInt(readline());
const $N = parseInt(readline());
var $arr = [];
$arr[0] = [0,$L];
for (let i = 0; i < $N; i++) {
    var inputs = readline().split(' ');
    const $st = parseInt(inputs[0]);
    const $ed = parseInt(inputs[1]);
    $arr.forEach(function($val, $key){
        if($st <= $val[0] && $ed >= $val[1]){
            $arr.splice($key, 1);
        }
        else if($st > $val[0] && $ed < $val[1]){
            $arr.splice($key, 1);
            $arr.push([$val[0], $st]);
            $arr.push([$ed, $val[1]]);
        }
        else{
            if($val[0] < $ed && $ed < $val[1]){
                $arr[$key][0] = $ed; 
            }
            if($val[0] < $st && $st < $val[1]){
                $arr[$key][1] = $st; 
            }
        }
    });
}
$arr = $arr.sort(function(a,b) {
    return a[0] - b[0];
});
if($arr.length !== 0){
    $arr.forEach(function($val){
        console.log($val.join(" "));
    });
}else{
    console.log("All painted");
}
