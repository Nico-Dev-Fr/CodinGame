const $e = readline();
console.log(isValid($e));

function isValid($str) {
    $arr = [];
    for ($i = 0; $i < $str.length; $i++) {
        switch ($str[$i]) {
            case '(': $arr.push(0); break;
            case ')': 
                if ($arr.pop() !== 0)
                    return 'false';
            break;
            case '[': $arr.push(1); break;
            case ']': 
                if ($arr.pop() !== 1)
                    return 'false';
            break;
            case '{': $arr.push(2); break;
            case '}': 
                if ($arr.pop() !== 2)
                    return 'false';
            break;
        }
    }
    return ($arr.length == 0)? 'true': 'false';
}