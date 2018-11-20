function myFunction() {
//   document.getElementById("demo").innerHTML = "Start enregistrer ";
  // window.open("https://www.w3schools.com");
  if (window.DeviceOrientationEvent) {
  //  window.addEventListener("devicemotion", motion, false ); 
  document.getElementById("demo").innerHTML = "Start enregistrer ";
  window.addEventListener('devicemotion', function(event) {
  
  console.log(event.acceleration.x + ' m/s2');
  document.getElementById("demoX").innerHTML = Math.trunc(event.accelerationIncludingGravity.x);
  document.getElementById("demoY").innerHTML = Math.trunc(event.accelerationIncludingGravity.y);
  document.getElementById("demoZ").innerHTML = Math.trunc(event.accelerationIncludingGravity.z);
  
    
  var c = document.getElementById("myCanvas");
  var ctx = c.getContext("2d");
  ctx.moveTo(0, 0);
  ctx.lineTo(0, Math.trunc(event.accelerationIncludingGravity.x)+100);
  ctx.stroke();  
    
    
  });

}
else {
 document.getElementById("demo").innerHTML = "Register not possible ";
}
}

  

