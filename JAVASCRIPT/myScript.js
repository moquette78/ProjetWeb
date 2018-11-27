
  

function sansRedardeteur() { //sansRedardeteur


  if (window.DeviceOrientationEvent) {
  //  window.addEventListener("devicemotion", motion, false ); 
  document.getElementById("startSansRetardateur").innerHTML = "Start enregistrer ";
  document.getElementById('startAvecRetardateur').remove();
  document.getElementById('AvecButton').remove();
  document.getElementById('SansButton').remove();
  
  window.addEventListener('devicemotion', function(event) {
  
  console.log(event.acceleration.x + ' m/s2');
  document.getElementById("demoX").innerHTML = Math.trunc(event.accelerationIncludingGravity.x);
  document.getElementById("demoY").innerHTML = Math.trunc(event.accelerationIncludingGravity.y);
  document.getElementById("demoZ").innerHTML = Math.trunc(event.accelerationIncludingGravity.z);
  
    //Graphic
  var c = document.getElementById("myCanvas");
  var ctx = c.getContext("2d");
  ctx.moveTo(0, 0);
  ctx.lineTo(0, Math.trunc(event.accelerationIncludingGravity.x)+100);//ctx.lineTo(0, Math.trunc(event.accelerationIncludingGravity.x)+100);
  ctx.stroke();  
    });
}

else {
 document.getElementById("startSansRetardateur").innerHTML = "Register not possible ";
  }
}




function avecRedardateur() {
  
document.getElementById("countdowntimer").textContent = 3;
 
 
  var timeleft = 3;
    var downloadTimer = setInterval(function(){
    timeleft--;
    document.getElementById("countdowntimer").textContent = timeleft;
    if(timeleft <= 0)clearInterval(downloadTimer);
    },1000);    
   
   a();
   
}

function a() {
  
   if (window.DeviceOrientationEvent) {

  
  
 // document.getElementById("startSansRetardateur").innerHTML = "Press on this button for recording ";
 document.getElementById('startSansRetardateur').remove();
 document.getElementById('SansButton').remove();
  document.getElementById('AvecButton').remove();
  
  document.getElementById("startAvecRetardateur").innerHTML = "Start enregistrer with Delay of 3 seconds ";
  window.addEventListener('devicemotion', function(event) {
  
  console.log(event.acceleration.x + ' m/s2');
  document.getElementById("demoX").innerHTML = Math.trunc(event.accelerationIncludingGravity.x);
  document.getElementById("demoY").innerHTML = Math.trunc(event.accelerationIncludingGravity.y);
  document.getElementById("demoZ").innerHTML = Math.trunc(event.accelerationIncludingGravity.z);
  });
}

else {
 document.getElementById("startSansRetardateur").innerHTML = "Register not possible ";
  }  
  
}
  


function stopRecording(){
  //TODO
  
  
}
