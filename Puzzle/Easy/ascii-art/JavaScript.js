 const L = parseInt(readline());
 const H = parseInt(readline());
 const T = readline();
 var letters = T.toUpperCase().split('');
 var alphabetArray = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ?'.split('');
 var alphabetMap = {};
 for (var j = alphabetArray.length - 1; j >= 0; j--) {
     alphabetMap[alphabetArray[j]] = [];
 }
 var asciiArray = [];
 for (var i = 0; i < H; i++) {
     var ROW = readline();
     var currentLetterIndex = 0;
     for (var j = 0; j < alphabetArray.length; j++) {
         var thisLetter = alphabetArray[j];
         alphabetMap[thisLetter][i] = ROW.substr(currentLetterIndex, L);
         currentLetterIndex += L;
     }
 }
 var result = '';
 for (var j = 0; j < H; j++) { //each line by height
     for (var i = 0; i < letters.length; i++) { //each letter in output
         var thisLetter = letters[i];
         if ((thisLetter < 'A') || (thisLetter > 'Z')) {
             thisLetter = '?';
         }
         result += alphabetMap[thisLetter][j];
     }
     result += '\n';
 }
 console.log(result);