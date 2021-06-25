$arr = [];
const tributes = parseInt(readline());
for (let i = 0; i < tributes; i++) {
    const $playerName = readline();
    $arr[$playerName] = {'Killed':['None'],'Killer':'Winner'};
}
$newArr = [];
Object.keys($arr).sort().forEach(function(v, i) {
    $newArr[v] = $arr[v];
});
$arr = $newArr;

const turns = parseInt(readline());
for (let i = 0; i < turns; i++) {
    const $info = readline().split(' killed ');
    $infoK = $info[1].split(', ');

    if($arr.hasOwnProperty($info[0])){
        if($arr[$info[0]]['Killed'][0] == 'None'){
            $arr[$info[0]]['Killed'] = []; 
        }
        $infoK.forEach(function($value){
            $arr[$info[0]]['Killed'].push($value);
        });
    }

    $infoK.forEach(function($value){
        if($arr.hasOwnProperty($value)){
            $arr[$value]['Killer'] = $info[0]; 
        }
    });
}
$i = 0;
$numItems = Object.keys($arr).length;

for (const $name in $arr) {
    $item = $arr[$name];
    $killed = $item['Killed'].sort().join(', ');
    $killer = $item['Killer'];

    console.log("Name: "+$name);
    console.log("Killed: "+$killed);
    console.log("Killer: "+$killer);

    if(++$i !== $numItems) {
        console.log("");
    }
}
