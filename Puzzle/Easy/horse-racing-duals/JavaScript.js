 const N = parseInt(readline());
 var orderArray = [];
 for (let i = 0; i < N; i++) {
     const pi = parseInt(readline());
     orderArray.push(pi);
 }
 
 orderArray.sort((a, b) => b - a);
 var D = null;
 var lastValue = orderArray[0];
 for (let i = 1; i < orderArray.length; i++) {
     currentDiff = lastValue - orderArray[i];
     if(D === null || D > currentDiff){
         D = currentDiff;
     }
     lastValue = orderArray[i];
 }
 console.log(D);
 