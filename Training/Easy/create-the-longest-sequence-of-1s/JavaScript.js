 const $b = readline();
 $last = null;
 $seq = 0;
 $maxS = 0;
 for($i=0;$i<$b.length;$i++){
     switch($b[$i]){
         case '0':
             if($last<$i && $last !== null){
                 $seq = $i - ($last + 1);
             }
             $seq ++;
             $last = $i;
             break;
         case '1':
             $seq ++;
             break;
         default:
             $seq = 0;
             break;
     }
      
     if($seq > $maxS)
         $maxS = $seq;
 }
 console.log($maxS);