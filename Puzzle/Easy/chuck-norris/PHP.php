<?php
$MESSAGE = stream_get_line(STDIN, 100 + 1, "\n");
$binary = '';
for ($i = 0; $i < strlen($MESSAGE); $i++){
    $data = unpack('H*', $MESSAGE[$i]);
    $binaryChar = base_convert($data[1], 16, 2);
    while(strlen($binaryChar) < 7){
        $binaryChar = "0".$binaryChar;
    }
    $binary .= $binaryChar;
}
$index = 0;
$encode = '';
while($index < strlen($binary)){
    $thisChar = $binary[$index];
    if($thisChar == '0'){
        $encode .= '00 ';
    }else{
        $encode .= '0 ';
    }
    while($binary[$index] == $thisChar){
        $encode .= '0';
        $index ++;
        if($index == strlen($binary)) break;
    }
    if($index != strlen($binary))$encode .= ' ';
}
echo($encode."\n");
?>