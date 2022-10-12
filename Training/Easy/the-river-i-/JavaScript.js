var $r1 = parseInt(readline());
var $r2 = parseInt(readline());
while($r1 != $r2){
    if($r1 < $r2){
        $r1 += getSeq($r1);
    }else{
        $r2 += getSeq($r2);
    }
}
console.log($r1);

function getSeq($r){
    $rSeq = 0;
    $rStr = $r.toString();
    for($i=0;$i<$rStr.length;$i++){
        $rSeq += parseInt($rStr[$i]);
    }
    return $rSeq;
}