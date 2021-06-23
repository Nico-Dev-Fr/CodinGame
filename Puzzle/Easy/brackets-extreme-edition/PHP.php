<?php
fscanf(STDIN, "%s", $e);
echo(isValid($e)."\n");

function isValid($str) {
    $arr = [];
    for ($i = 0; $i < strlen($str); $i++) {
        switch ($str[$i]) {
            case '(': array_push($arr, 0); break;
            case ')': 
                if (array_pop($arr) !== 0)
                    return 'false';
            break;
            case '[': array_push($arr, 1); break;
            case ']': 
                if (array_pop($arr) !== 1)
                    return 'false';
            break;
            case '{': array_push($arr, 2); break;
            case '}': 
                if (array_pop($arr) !== 2)
                    return 'false';
            break;
        }
    }
    return (empty($arr))? 'true': 'false';
}
?>