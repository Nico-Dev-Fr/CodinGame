<?php
fscanf(STDIN, "%d %d %d %d %d %d %d %d", $nbFloors, $width, $nbRounds, $exitFloor, $exitPos, $nbTotalClones, $nbAdditionalElevators, $nbElevators);

$elevatorArray = array();
for ($i = 0; $i < $nbElevators; $i++)
{
    fscanf(STDIN, "%d %d", $elevatorFloor, $elevatorPos);
    $elevatorArray[$elevatorFloor] = $elevatorPos;
}
$elevatorArray[$exitFloor] = $exitPos;

// game loop
while (TRUE)
{
    fscanf(STDIN, "%d %d %s", $cloneFloor, $clonePos, $direction);error_log(var_export($cloneFloor, true));
    if(($elevatorArray[$cloneFloor] < $clonePos && $direction == "RIGHT") || ($elevatorArray[$cloneFloor] > $clonePos && $direction == "LEFT") ){
        echo("BLOCK\n"); 
    }else{
        if($clonePos == $width - 1 || $clonePos === 0){
            echo("BLOCK\n"); 
        }else{
            echo("WAIT\n"); 
        }
    }
}
?>
