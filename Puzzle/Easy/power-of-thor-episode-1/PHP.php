<?php
fscanf(STDIN, "%d %d %d %d", $lightX, $lightY, $initialTx, $initialTy);
$Tx = $initialTx;
$Ty = $initialTy;
// game loop
while (TRUE)
{
    fscanf(STDIN, "%d", $remainingTurns);
    if($lightX < $Tx && $lightY < $initialTy){
        $Tx --;
        $Ty --;
        echo("NW\n");
    }else if($lightX > $Tx && $lightY > $Ty){
        $Tx ++;
        $Ty ++;
        echo("SE\n");
    }else if($lightX > $Tx && $lightY < $Ty){
        $Tx ++;
        $Ty --;
        echo("NE\n");
    }else if($lightX < $Tx && $lightY > $Ty){
        $Tx --;
        $Ty ++;
        echo("SW\n");
    }else if($lightX > $Tx && $lightY == $Ty){
        $Tx ++;
        echo("E\n");
    }else if($lightX == $Tx && $lightY > $Ty){
        $Ty ++;
        echo("S\n");
    }else if($lightX == $Tx && $lightY < $Ty){
        $Ty --;
        echo("N\n");
    }else if($lightX < $Tx && $lightY == $Ty){
        $Tx --;
        echo("W\n");
    }
}
?>