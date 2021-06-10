 var inputs = readline().split(' ');
 const W = parseInt(inputs[0]); // number of columns.
 const H = parseInt(inputs[1]); // number of rows.
 var grid_array = [];
 
 for (let i = 0; i < H; i++) {
     const LINE = readline(); // represents a line in the grid and contains W integers. Each integer represents one room of a given type.
     var split_line = LINE.split(' ');
     grid_array[i] = split_line;
 }
 const EX = parseInt(readline()); // the coordinate along the X axis of the exit (not useful for this first mission, but must be read).
 
 // game loop
 while (true) {
     var inputs = readline().split(' ');
     var XI = parseInt(inputs[0]);
     var YI = parseInt(inputs[1]);
     const POS = inputs[2];
     var type_room = grid_array[YI][XI];
     console.error("type_room " + type_room)
     console.error("POS " + POS)
     switch(parseInt(type_room)){
         case 0:
         console.error("ERROR_ITS_A_WALL")
         break;
 
         case 1:
         YI ++;
         break;
 
         case 2:
             if(POS == "LEFT"){XI ++;}else{XI --;}
         break;
 
         case 3:
             YI ++;
         break;
 
         case 4:
             if(POS == "RIGHT"){YI ++;}else{XI --}
         break;
 
         case 5:
             if(POS == "LEFT"){YI ++;}else{XI ++}
         break;
 
         case 6:
             if(POS == "LEFT"){XI ++;}else{XI --;}
         break;
 
         case 7:
         YI ++;
         break;
 
         case 8:
         YI ++;
         break;
 
         case 9:
         YI ++;
         break;
 
         case 10:
         XI--;
         break;
 
         case 11:
         XI ++;
         break;
 
         case 12:
         YI ++;
         break;
 
         case 13:
         YI ++;
         break;
     }
     console.log(XI + ' ' + YI);
 }
 