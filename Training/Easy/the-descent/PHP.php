<?php
while (TRUE)
{
    $moutainIndex = 0;
    $heigherMountain = 0;
    for ($i = 0; $i < 8; $i++)
    {
        fscanf(STDIN, "%d", $mountainH);
        if($mountainH > $heigherMountain){
            $heigherMountain = $mountainH;
            $moutainIndex = $i;
        }
    }
    echo($moutainIndex."\n");
}
?>