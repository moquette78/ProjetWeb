
//For register the movements

var c;
var ctx;
var sizeofgraph = 100; //this value needs the same as the value from the html document
var arrX = ["0"];
var arrY = ["0"];
var arrZ = ["0"];
var second = 0;  //For the countUp function
var x = 0;
var y = 0;
var z = 0;
var SpeedOfRegister = 100; //for the function RegisterData

var movements = function(event) {
  
  console.log(event.acceleration.x + ' m/s2');
  x = Math.trunc(event.accelerationIncludingGravity.x);
  y = Math.trunc(event.accelerationIncludingGravity.y);
  z = Math.trunc(event.accelerationIncludingGravity.z);
  document.getElementById("demoX").innerHTML = x //Math.trunc(event.accelerationIncludingGravity.x);
  document.getElementById("demoY").innerHTML = y//Math.trunc(event.accelerationIncludingGravity.y);
  document.getElementById("demoZ").innerHTML = z //Math.trunc(event.accelerationIncludingGravity.z);
}


function countUp () {
            second++;
            if(second == 59){
              second = 0;
            }
           arrX.push(x);//second);
           arrY.push(y);//second);
           arrZ.push(z);//second);
          document.getElementById("count-up").innerText = second;
}

 //ctx.lineTo(second,sizeofgraph-Math.trunc(event.accelerationIncludingGravity.x));
        
        //old = Math.trunc(event.accelerationIncludingGravity.x); 


function sansRedardeteur() { //sansRedardeteur

  if (window.DeviceOrientationEvent) {
  //  window.addEventListener("devicemotion", motion, false ); 
  document.getElementById("startSansRetardateur").innerHTML = "Start enregistrer ";
  document.getElementById('startAvecRetardateur').remove();
  document.getElementById('AvecButton').remove();
  document.getElementById('SansButton').remove();
  

  
  //Hier listener installieren
  window.addEventListener('devicemotion',movements);
  registerData();
  }
  else {
  document.getElementById("startSansRetardateur").innerHTML = "Register not possible ";
  }
}




function avecRedardateur() {
  
document.getElementById("countdowntimer").textContent = 3;

//Both timeouts are nece 
  var timeleft = 3;
    var downloadTimer = setInterval(function(){
    timeleft--;
    document.getElementById("countdowntimer").textContent = timeleft;
    if(timeleft <= 0)clearInterval(downloadTimer);
    },1000);    


//SetTimeOut CALL! 
setTimeout(function(){ 
  
    if (window.DeviceOrientationEvent) {
  
    document.getElementById('startSansRetardateur').remove();
    document.getElementById('SansButton').remove();
    document.getElementById('AvecButton').remove();
    document.getElementById("startAvecRetardateur").innerHTML = "Start enregistrer with Delay of 3 seconds ";
      
    window.addEventListener('devicemotion', movements);
    registerData();
    
  }
else {
     document.getElementById("startSansRetardateur").innerHTML = "Register not possible ";
    } 
  
},3000);

   
 
   
}



//for killing the "setInterval you have to : clearInterval(counterId);
//Is saving all data every "second";
function registerData(){
    var counterId = setInterval(function(){
                        countUp();
                      }, SpeedOfRegister); //SpeedOfRegister = 1000; so it calls every second countUP();
  
}

function drawGraphX() {
  
  //TODO Dessiner marche pas encore 
    c = document.getElementById("my");
  ctx = c.getContext("2d");
  
 
 // ctx.strokeStyle = '#000000';
   ctx.moveTo(0,sizeofgraph/2);
  ctx.lineTo(100,sizeofgraph/2);
  
  
  ctx.moveTo(0, sizeofgraph/2);
  
  
  

  for(var i = 0; i < arrX.length; i++){
	ctx.lineTo(i, (sizeofgraph/2)- parseInt(arrX[i],10));

	}


  ctx.lineWidth = 1;
  ctx.strokeStyle = '#ff0000';
  ctx.stroke(); 
}



function drawGraphY() {
  
  //TODO Dessiner marche pas encore 
    c = document.getElementById("myY");
  ctx = c.getContext("2d");
  
  ctx.moveTo(0,sizeofgraph/2);
  ctx.lineTo(100,sizeofgraph/2);
  
  ctx.moveTo(0, sizeofgraph/2);
  

  for(var i = 0; i < arrY.length; i++){
	ctx.lineTo(i, (sizeofgraph/2) - parseInt(arrY[i],10));

	}

  ctx.lineWidth = 1;
  ctx.strokeStyle = '#0000ff';
  ctx.stroke(); 
}

function drawGraphZ() {
  

    c = document.getElementById("myZ");
  ctx = c.getContext("2d");
  ctx.moveTo(0, sizeofgraph/2);
    ctx.lineTo(100,sizeofgraph/2);
  
  ctx.moveTo(0, sizeofgraph/2);
 

  for(var i = 0; i < arrZ.length; i++){
	ctx.lineTo(i, (sizeofgraph/2)- parseInt(arrZ[i],10));

	}

  ctx.lineWidth = 1;
  ctx.strokeStyle = '#008000';
  ctx.stroke(); 
}
//es kann sein dass man einen neuee variablen brauch für ctx und c; 





function stopRecording(){

window.removeEventListener('devicemotion',movements)
  //Its just for testing I will delete all 
document.getElementById("demoX").innerHTML = arrX.toString(); 
document.getElementById("demoY").innerHTML = arrY.toString();
document.getElementById("demoZ").innerHTML = arrZ.toString();
drawGraphX();
drawGraphY();
drawGraphZ();
  
  
    
  
}


function sendDonnees() {
  
  
 //document.getElementById("demoZ").innerHTML = document.getElementById("keyword").value; 
 if(document.getElementById("keyword").value === ""){
   
   document.getElementById("ok").innerHTML = "Keyword can't be empty";
   
   console.log(" empty, not good");
 } 
 
 else{
   document.getElementById("ok").innerHTML = "Data are sended";
   console.log("not empty, good");
   sendData(); 
 }
}


function sendData() {
  
  var ar = <?php echo json_encode($ar) ?>;
  console.log(pseudo); 
}
