/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/
 $thisC = 0;
 $maxC = 0;
 $lights_arr = [];
 var inputs = readline().split(' ');
 const n = parseInt(inputs[0]);
 const m = parseInt(inputs[1]);
 const c = parseInt(inputs[2]);
 var inputs = readline().split(' ');
 for (let i = 0; i < n; i++) {
     const $nx = parseInt(inputs[i]);
     $lights_arr[i] = [$nx, false];
 }
 var inputs = readline().split(' ');
 for (let i = 0; i < m; i++) {
     const $mx = parseInt(inputs[i]) - 1;
     $lightC = $lights_arr[$mx][0];
     switch($lights_arr[$mx][1]){
         case true:
         $thisC -= $lightC;
         $lights_arr[$mx][1] = false;
         break;
         case false:
         $thisC += $lightC;
         $lights_arr[$mx][1] = true;
         break;
     }
     $maxC = ($thisC > $maxC)? $thisC : $maxC;
 
     if($thisC > c){
         break;
     }
 }
 if($maxC < c){
     console.log('Fuse was not blown.');
     console.log('Maximal consumed current was '+$maxC+' A.');
 }else{
     console.log('Fuse was blown.');
 }
 