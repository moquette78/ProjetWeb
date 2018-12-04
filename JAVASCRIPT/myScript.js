
//For register the movements
var movements = function(event) {
  
  console.log(event.acceleration.x + ' m/s2');
  
  document.getElementById("demoX").innerHTML = Math.trunc(event.accelerationIncludingGravity.x);
  document.getElementById("demoY").innerHTML = Math.trunc(event.accelerationIncludingGravity.y);
  document.getElementById("demoZ").innerHTML = Math.trunc(event.accelerationIncludingGravity.z);
  
    //Graphic
  var c = document.getElementById("myCanvas");
  var ctx = c.getContext("2d");
  ctx.moveTo(0, 0);
 ctx.lineTo(100, 75);
    ctx.lineTo(100, 25);
  //ctx.lineTo(0, Math.trunc(event.accelerationIncludingGravity.x)+100);//ctx.lineTo(0, Math.trunc(event.accelerationIncludingGravity.x)+100);
  ctx.stroke();  
    }


function sansRedardeteur() { //sansRedardeteur


  if (window.DeviceOrientationEvent) {
  //  window.addEventListener("devicemotion", motion, false ); 
  document.getElementById("startSansRetardateur").innerHTML = "Start enregistrer ";
  document.getElementById('startAvecRetardateur').remove();
  document.getElementById('AvecButton').remove();
  document.getElementById('SansButton').remove();
  
  
  //Hier listener installieren
  window.addEventListener('devicemotion',movements);
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



setTimeout(function(){ 
  
    if (window.DeviceOrientationEvent) {
  
    document.getElementById('startSansRetardateur').remove();
    document.getElementById('SansButton').remove();
    document.getElementById('AvecButton').remove();
    document.getElementById("startAvecRetardateur").innerHTML = "Start enregistrer with Delay of 3 seconds ";
    window.addEventListener('devicemotion', movements);
  }

  else {
     document.getElementById("startSansRetardateur").innerHTML = "Register not possible ";
    } 
  
} ,3000);

   
 
   
}


function stopRecording(){

window.removeEventListener('devicemotion',movements)

  
}
