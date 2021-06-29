<?php
fscanf(STDIN, "%d %d %d %d %d %d %d %d", $nbFloors, $width, $nbRounds, $exitFloor, $exitPos, $nbTotalClones, $nbAdditionalElevators, $nbElevators);

    error_log(var_export('nbAdditionalElevators'.$nbAdditionalElevators, true));
$elevatorArray = array();
for ($i = 0; $i < $nbElevators; $i++)
{
    fscanf(STDIN, "%d %d", $elevatorFloor, $elevatorPos);
    if(array_key_exists($elevatorFloor,$elevatorArray) && $elevatorFloor != 0){
        if($elevatorArray[$elevatorFloor] > $elevatorPos){
            $elevatorArray[$elevatorFloor] = $elevatorPos;
        }
    }else{
        $elevatorArray[$elevatorFloor] = $elevatorPos;
    }
}
$elevatorArray[$exitFloor] = $exitPos;

// game loop
while (TRUE)
{
    fscanf(STDIN, "%d %d %s", $cloneFloor, $clonePos, $direction);
    error_log(var_export($cloneFloor, true));
    if($cloneFloor != -1){
        if(!array_key_exists($cloneFloor,$elevatorArray) && $exitFloor != $cloneFloor){
            $elevatorArray[$cloneFloor] = $clonePos;
            echo("ELEVATOR\n"); 
        }else if(array_key_exists($cloneFloor,$elevatorArray) && $nbAdditionalElevators > 0 && ($elevatorArray[$cloneFloor] - $clonePos > 10) || $elevatorArray[$cloneFloor+1] == $elevatorArray[$cloneFloor-1]){
            $elevatorArray[$cloneFloor] = $clonePos;
            $nbAdditionalElevators--;
            echo("ELEVATOR\n"); 
        }
        else{
    error_log(var_export($elevatorArray[$cloneFloor], true));
    error_log(var_export($clonePos, true));
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
    }else{
        echo("WAIT\n"); 
    }

}
?>
