<?php
fscanf(STDIN, "%s", $LON);
fscanf(STDIN, "%s", $LAT);
fscanf(STDIN, "%d", $N);

$LON = floatval(str_replace(',','.',$LON));
$LAT = floatval(str_replace(',','.',$LAT));
$array = [];
$nearestDist = null;
$nearestName;
for ($i = 0; $i < $N; $i++)
{
    $DEFIB = stream_get_line(STDIN, 256 + 1, "\n");
    $DEFIB = explode(';', $DEFIB); 
    $lonD = floatval(str_replace(',','.', $DEFIB[4]));
    $latD = floatval(str_replace(',','.', $DEFIB[5]));
    $x = ($lonD - $LON) * cos(($latD + $LAT)/2);
    $y = ($latD - $LAT);
    $d = sqrt(pow($x, 2) + pow($y, 2)) * 6371;
    if(is_null($nearestDist) || $nearestDist > $d){
        $nearestDist = $d;
        $nearestName = $DEFIB[1];
    }
}
echo $nearestName."\n";
?>