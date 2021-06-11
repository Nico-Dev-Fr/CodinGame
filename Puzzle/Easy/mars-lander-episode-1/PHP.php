<?php
fscanf(STDIN, "%d", $surfaceN);
for ($i = 0; $i < $surfaceN; $i++)
{
    fscanf(STDIN, "%d %d", $landX, $landY);
}

// game loop
while (TRUE)
{
    fscanf(STDIN, "%d %d %d %d %d %d %d", $X, $Y, $hSpeed, $vSpeed, $fuel, $rotate, $power);
    if($vSpeed <= -40){
        echo("0 4\n");
    }else{
        echo("0 0\n");
    }
}
?>