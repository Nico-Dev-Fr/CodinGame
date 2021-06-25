/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/
 var cardp1Array = [];
 var cardp2Array = [];
 var tempArray = [];
 var for_lenght = 0;
 var total_turns = 0;
 var isFinish = {
     status: false,
     player: 0
 };
 
 const n = parseInt(readline()); // the number of cards for player 1
 for (let i = 0; i < n; i++) {
     var cardp1 = readline(); // the n cards of player 1*
     cardp1Array.push(card_to_int(cardp1));
 }
 const m = parseInt(readline()); // the number of cards for player 2
 for (let i = 0; i < m; i++) {
     var cardp2 = readline(); // the m cards of player 2
     cardp2Array.push(card_to_int(cardp2));
 }
 
 console.error(cardp1Array)
 console.error(cardp2Array)
 while(!isFinish.status){
     if(cardp1Array.length <= cardp2Array.length){
         for_lenght = cardp1Array.length;
     }else{
         for_lenght = cardp2Array.length;
     }
     for (let i = 0; i < for_lenght; i++) {
         if(cardp1Array[i] > cardp2Array[i]){
             cardp1Array.push(cardp1Array[i])
             cardp1Array.push(cardp2Array[i])
             cardp1Array[i] = 0;
             cardp2Array[i] = 0;
             total_turns ++;
         }else if(cardp1Array[i] < cardp2Array[i]){
             cardp2Array.push(cardp1Array[i])
             cardp2Array.push(cardp2Array[i])
             cardp1Array[i] = 0;
             cardp2Array[i] = 0;
             total_turns ++;
         }else{
             tempArray = battle(i, cardp1Array, cardp2Array, tempArray);
             i += 3;
             if(cardp1Array[i] > cardp2Array[i]){
                 cardp1Array.concat(tempArray)
             }else if(cardp1Array[i] < cardp2Array[i]){
                 cardp2Array.concat(tempArray)
             }
             tempArray = [];
             // isFinish.status = true
         }
     }
     cardp1Array = remove_0_array(cardp1Array);
     cardp2Array = remove_0_array(cardp2Array);
     isFinish = check_game_status(cardp1Array, cardp2Array, isFinish)
 }
 if(isFinish.status === true){
     console.log(isFinish.player + ' ' + total_turns);
 }
 
 
 // Write an answer using console.log()
 // To debug: console.error('Debug messages...');
 function battle(index, cardp1Array, cardp2Array, tempArray){
     for (let i = index; i < index + 4; i++) {
         tempArray.push(cardp1Array[i])
         tempArray.push(cardp2Array[i])
         cardp1Array[i] = 0;
         cardp2Array[i] = 0;
     }
     return tempArray;
 }
 
 function check_game_status(p1 , p2, isFinish){
     if(p1.length === 0){
         isFinish.status = true;
         isFinish.player = 2;
     }else if(p2.length === 0){
         isFinish.status = true;
         isFinish.player = 1;
     }
     return isFinish;
 }
 
 function remove_0_array(array){
     return array.filter(function(x) {
         return x !== 0;
     });
 }
 
 function card_to_int(value){
     var cardValue = value.substring(0, value.length - 1);
     switch(cardValue){
         case 'J':
             cardValue = 11;
         break;
         case 'Q':
             cardValue = 12;
         break;
         case 'K':
             cardValue = 13;
         break;
         case 'A':
             cardValue = 14;
         break;
         default:
             cardValue = parseInt(cardValue);
         break;
     }
     return cardValue;
 }