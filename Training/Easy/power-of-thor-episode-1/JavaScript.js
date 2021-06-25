var inputs = readline().split(' ');
const lightX = parseInt(inputs[0]); // the X position of the light of power
const lightY = parseInt(inputs[1]); // the Y position of the light of power
const initialTx = parseInt(inputs[2]); // Thor's starting X position
const initialTy = parseInt(inputs[3]); // Thor's starting Y position

var Tx = initialTx;
var Ty = initialTy;
// game loop
while (true) {
    const remainingTurns = parseInt(readline()); // The remaining amount of turns Thor can move. Do not remove this line.

    // Write an action using console.log()
    // To debug: console.error('Debug messages...');
    if(lightX < Tx && lightY < initialTy){
        Tx --;
        Ty --;
        console.log('NW')
    }else if(lightX > Tx && lightY > Ty){
        Tx ++;
        Ty ++;
        console.log('SE')
    }else if(lightX > Tx && lightY < Ty){
        Tx ++;
        Ty --;
        console.log('NE')
    }else if(lightX < Tx && lightY > Ty){
        Tx --;
        Ty ++;
        console.log('SW')
    }else if(lightX > Tx && lightY == Ty){
        Tx ++;
        console.log('E')
    }else if(lightX == Tx && lightY > Ty){
        Ty ++;
        console.log('S')
    }else if(lightX == Tx && lightY < Ty){
        Ty --;
        console.log('N')
    }else if(lightX < Tx && lightY == Ty){
        Tx --;
        console.log('W')
    }
}
