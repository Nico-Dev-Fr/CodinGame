var isValid = true;
var columnArray = new Array();
var subGridArray = new Array();
for (let i = 0; i < 9; i++) {
    var inputs = readline().split(' ');
    if(haveDuplicates(inputs)){
        isValid = false;
        break;
    }
    for (let j = 0; j < 9; j++) {
        if(columnArray[j] === undefined) columnArray[j] = new Array();
        const n = parseInt(inputs[j]);
        columnArray[j].push(n);
        
        if(subGridArray[getSquareIndex(i, j)] === undefined) subGridArray[getSquareIndex(i, j)] = new Array();
        subGridArray[getSquareIndex(i, j)].push(n);
    }
}

for (let i = 0; i < columnArray.length; i++) {
    if(haveDuplicates(columnArray[i])){
        isValid = false;
        break;
    }
}
for (let i = 0; i < subGridArray.length; i++) {
    if(haveDuplicates(subGridArray[i])){
        isValid = false;
        break;
    }
}
function getSquareIndex(rowIndex, colIndex){
    return squareIndex = (Math.floor(rowIndex / 3) * 3) + Math.floor(colIndex / 3);
}
function haveDuplicates(array){
    return array.some((val, x) => array.indexOf(val) !== x)
}
console.log(isValid);
