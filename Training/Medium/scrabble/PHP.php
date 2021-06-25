<?php
 $wordArr = [];
fscanf(STDIN, "%d", $N);
for ($i = 0; $i < $N; $i++)
{
    $W = stream_get_line(STDIN, 30 + 1, "\n");
    $wordArr[$i] = $W;
}
$LETTERS = stream_get_line(STDIN, 7 + 1, "\n");

$maxP = 0;
$resWord = '';
foreach ($wordArr as &$value) {
    $p = getScore($value, $LETTERS);
    if($p > $maxP){
        $maxP = $p;
        $resWord = $value;
    }
}

echo($resWord."\n");

function getScore($word, $letters){
$score = [1,3,3,2,1,4,2,4,1,8,5,1,3,1,1,3,10,1,1,1,1,4,4,8,4,10];
    $res = 0;
    for ($i = 0; $i < strlen($word); $i++)
    {
        $pos = strpos($letters,$word[$i]);
        if($pos !== false){
            $charPointIndex = ord(strtolower($word[$i])) - 97;
            $res += $score[$charPointIndex];
            $letters = substr_replace($letters, '', $pos, 1);
        }else{
            return 0;
        }
    }
    return $res;
}
?>