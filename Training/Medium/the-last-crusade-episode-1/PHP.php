<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

// $W: number of columns.
// $H: number of rows.
fscanf(STDIN, "%d %d", $W, $H);
$arr = [];
for ($i = 0; $i < $H; $i++)
{
    $LINE = stream_get_line(STDIN, 200 + 1, "\n");// represents a line in the grid and contains W integers. Each integer represents one room of a given type.
    $arr[$i] = explode(' ', $LINE);
}
// $EX: the coordinate along the X axis of the exit (not useful for this first mission, but must be read).
fscanf(STDIN, "%d", $EX);

// game loop
while (TRUE)
{
    fscanf(STDIN, "%d %d %s", $XI, $YI, $POS);
    $type_room = $arr[$YI][$XI];
    switch(intval($type_room)){ 
         case 2:
             if($POS == "LEFT"){$XI ++;}else{$XI --;}
         break;
 
         case 4:
             if($POS == "RIGHT"){$YI ++;}else{$XI --;}
         break;
 
         case 5:
             if($POS == "LEFT"){$YI ++;}else{$XI ++;}
         break;
 
         case 6:
             if($POS == "LEFT"){$XI ++;}else{$XI --;}
         break;
 
         case 10:
            $XI--;
         break;
 
         case 11:
            $XI ++;
         break;
 
         case 1:
         case 3:
         case 7:
         case 8:
         case 9:
         case 12:
         case 13:
            $YI ++;
         break;
     }
     echo $XI.' '.$YI."\n";
}
?>