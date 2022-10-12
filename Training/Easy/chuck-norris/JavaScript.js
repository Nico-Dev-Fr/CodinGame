const $MESSAGE = readline();
$binary = '';
for ($i = 0; $i < $MESSAGE.length; $i++){
    $binaryChar = $MESSAGE[$i].charCodeAt(0).toString(2)
    while($binaryChar.length < 7){
        $binaryChar = "0"+$binaryChar;
    }
    $binary += $binaryChar;
}
$index = 0;
$encode = '';
while($index < $binary.length){
    $thisChar = $binary[$index];
    if($thisChar == '0'){
        $encode += '00 ';
    }else{
        $encode += '0 ';
    }
    while($binary[$index] == $thisChar){
        $encode += '0';
        $index ++;
        if($index == $binary.length) break;
    }
    if($index != $binary.length)$encode += ' ';
}
console.log($encode);