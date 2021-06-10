<?php
fscanf(STDIN, "%d", $L);
fscanf(STDIN, "%d", $H);
$T = stream_get_line(STDIN, 256 + 1, "\n");
$letters = str_split(strtoupper($T));
$alphabetArray = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ?');
$alphabetSize = sizeof($alphabetArray);
$alphabetMap = [];
$asciiArray = [];
$result = '';

for ($j = $alphabetSize - 1; $j >= 0; $j--) {
     $alphabetMap[$alphabetArray[$j]] = [];
 }
for ($i = 0; $i < $H; $i++)
{
    $ROW = stream_get_line(STDIN, 1024 + 1, "\n");
    $currentLetterIndex = 0;
     for ($j = 0; $j < $alphabetSize; $j++) {
         $alphabetMap[$alphabetArray[$j]][$i] = substr($ROW, $currentLetterIndex, $L);
         $currentLetterIndex += $L;
     }
}
for ($j = 0; $j < $H; $j++) { //each line by height
     for ($i = 0; $i < sizeof($letters); $i++) { //each letter in output
         $thisLetter = $letters[$i];
         if (($thisLetter < 'A') || ($thisLetter > 'Z')) {
            $thisLetter = '?';
         }
         $result .= $alphabetMap[$thisLetter][$j];
     }
    $result .= "\n";
 }
echo($result);
?>