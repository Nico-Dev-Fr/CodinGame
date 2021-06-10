const n = parseInt(readline()); // the number of temperatures to analyse
var inputs = readline().split(' ');
var closest = 0;
for (let i = 0; i < n; i++) {
    const t = parseInt(inputs[i]);// a temperature expressed as an integer ranging from -273 to 5526
    if(closest === 0){
        closest = t;
    }else if(t > 0 && t <= Math.abs(closest) ){
        closest = t
    }else if(t < 0 && -t < Math.abs(closest) ){
        closest = t;
    }
}

// Write an answer using console.log()
// To debug: console.error('Debug messages...');

console.log(closest);