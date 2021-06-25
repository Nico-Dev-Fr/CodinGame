$arr = [];
const $N = parseInt(readline());
for (let $i = 0; $i < $N; $i++) {
    const $line = readline();
    $arr[$i] = $line.split('');
}
for (let $i = 0; $i < $N; $i++) {
    $count = 0;
    for ($j = 0; $j < $arr[$i].length; $j++){
        if($arr[$i][$j]!='.'){
            $count ++;
            $j += 2;
        }
    }
    console.log($count);
}
