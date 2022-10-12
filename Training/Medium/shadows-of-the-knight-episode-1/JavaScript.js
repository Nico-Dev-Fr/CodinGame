var inputs = readline().split(' ');
const W = parseInt(inputs[0]); // width of the building.
const H = parseInt(inputs[1]); // height of the building.
const N = parseInt(readline()); // maximum number of turns before game over.
var inputs = readline().split(' ');
var x = parseInt(inputs[0]);
var y = parseInt(inputs[1]);

var x1 = 0;
var x2 = W - 1;
var y1 = 0;
var y2 = H - 1;
while (true) {
    const bombDir = readline();
    if(bombDir.includes('D')){
        y1 = y + 1;
    }else if(bombDir.includes('U')){
        y2 = y - 1;
    }
    if(bombDir.includes('R')){
        x1 = x + 1;
    }else if(bombDir.includes('L')){
        x2 = x - 1;
    }
    x = parseInt(x1 + (x2 - x1) / 2);
    y = parseInt(y1 + (y2 - y1) / 2);
    console.log(x+' '+y);
}