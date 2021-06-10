 const LON = readline();
 const LAT = readline();
 const N = parseInt(readline());
 var arrayJSON = [];
 var nearestDist = null;
 var nearestName = '';
 for (let i = 0; i < N; i++) {
     const DEFIB = readline();
     var dataSplit = DEFIB.split(';');
     var dataJSON = {
         name : dataSplit[1],
         adr : dataSplit[2],
         number : dataSplit[3],
         lon : parseFloat(dataSplit[4].replace(',', '.')),
         lat : parseFloat(dataSplit[5].replace(',', '.'))
     }
     arrayJSON.push(dataJSON);
     
     var current_lon = parseFloat(LON.replace(',', '.'))
     var current_lat = parseFloat(LAT.replace(',', '.'))
     var x = (dataJSON.lon - current_lon) * Math.cos((dataJSON.lat + current_lat)/2);
     var y = (dataJSON.lat - current_lat);
     var d = Math.sqrt(Math.pow(x, 2) + Math.pow(y, 2)) * 6371;
     if(nearestDist === null || nearestDist > d){
         nearestDist = d;
         nearestName = dataJSON.name;
     }
 }
 console.log(nearestName);
 