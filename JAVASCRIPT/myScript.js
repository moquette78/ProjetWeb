  //For register the movements

  var c;
  var ctx;
  var sizeofgraph = 150; //this value needs the same as the value from the html document
  var arrX = ["0"];
  var arrY = ["0"];
  var arrZ = ["0"];
  var second = 0;  //For the countUp function
  var x = 0;
  var y = 0;
  var z = 0;
  var a = 0;
  var b = 0;
  var c = 0;
  var arrA = ["0"];
  var arrB = ["0"];
  var arrC = ["0"];
  var SpeedOfRegister = 100; //for the function RegisterData
  var registerDataId = 0;


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
             arrA.push(a);
             arrB.push(b);
             arrC.push(c);
            document.getElementById("count-up").innerText = second;
  }

  function process(event) {
  a = event.alpha;
  b = event.beta;
  c = event.gamma;
}

   //ctx.lineTo(second,sizeofgraph-Math.trunc(event.accelerationIncludingGravity.x));
          
          //old = Math.trunc(event.accelerationIncludingGravity.x); 


  function sansRedardeteur() { //sansRedardeteur

    if (window.DeviceOrientationEvent) {
    //  window.addEventListener("devicemotion", motion, false ); 
    document.getElementById("startSansRetardateur").innerHTML = "<br>Start enregistrer ";
    document.getElementById('startAvecRetardateur').remove();
    document.getElementById('AvecButton').remove();
    document.getElementById('SansButton').remove();
    
    //Hier listener installieren
    window.addEventListener('devicemotion',movements);
    window.addEventListener("deviceorientation", process, false);
    registerData();
    }
    else {
    document.getElementById("startSansRetardateur").innerHTML = "Register not possible ";
    }
  }




  function avecRedardateur() {
    
  document.getElementById("countdowntimer").textContent = 3;

  // 
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
      document.getElementById("countdowntimer").remove();
      document.getElementById("startAvecRetardateur").innerHTML = "<br>Start enregistrer with Delay of 3 seconds ";
        
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
      registerDataId = setInterval(function(){
                          countUp();
                        }, SpeedOfRegister); //SpeedOfRegister = 1000; so it calls every second countUP();
    
  }

  function drawGraphX() {
     
    c = document.getElementById("my");
    ctx = c.getContext("2d");
    
   // ctx.strokeStyle = '#000000';
    ctx.moveTo(0,sizeofgraph/2);
    ctx.lineTo(sizeofgraph,sizeofgraph/2);
    ctx.moveTo(0, sizeofgraph/2);
    
    for(var i = 0; i < arrX.length; i++){
  	ctx.lineTo(i, (sizeofgraph/2)- parseInt(arrX[i],10));

  	}


    ctx.lineWidth = 1;
    ctx.strokeStyle = '#ff0000';
    ctx.stroke(); 
  }



  function drawGraphY() {
    
    c = document.getElementById("myY");
    ctx = c.getContext("2d");
    ctx.moveTo(0,sizeofgraph/2);
    ctx.lineTo(sizeofgraph,sizeofgraph/2);
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
    ctx.lineTo(sizeofgraph,sizeofgraph/2);
    ctx.moveTo(0, sizeofgraph/2);
   

    for(var i = 0; i < arrZ.length; i++){
  	ctx.lineTo(i, (sizeofgraph/2)- parseInt(arrZ[i],10));

  	}

    ctx.lineWidth = 1;
    ctx.strokeStyle = '#008000';
    ctx.stroke(); 
  }
 

  function stopRecording(){

  window.removeEventListener('devicemotion',movements)
    //Its just for testing I will delete all 
  clearInterval(registerDataId);
 document.getElementById("stopButton").remove();
 // document.getElementById("demoX").innerHTML = arrX.toString(); 
 // document.getElementById("demoY").innerHTML = arrY.toString();
 // document.getElementById("demoZ").innerHTML = arrZ.toString();
  drawGraphX();
  drawGraphY();
  drawGraphZ();   
  }

function sendDonnees(){

if(document.getElementById("keyword").value === ""){
     
     document.getElementById("ok").innerHTML = "Keyword can't be empty";
   } else{
	//alert("KIK");
     $.ajax({
         url : '../PHP/envoi.php',
         type : 'POST', // Le type de la requête HTTP, ici devenu POST
         data: { 
          'x':arrX, 
          'y':arrY, 
          'z':arrZ,
          'a':arrA,
          'b':arrB,
          'c':arrC,
          'keyword' : $("#keyword").val()
      },
      success: function(msg){
        document.location.href="../HTML/affichage.php";
  },
  error: function(XMLHttpRequest, textStatus, errorThrown) {
     alert("some error");
  } 
    });
   }  
}




function showHint(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
		
            }
        };
        xmlhttp.open("GET", "../PHP/gethint.php?q=" + str + "&start=" + document.getElementById("trip_start").value + "&end=" + document.getElementById("trip_fin").value + "&user=" + document.getElementById("userData").value , true);
        xmlhttp.send();
    }
}

function compareStrings(str){
 
	console.log("CompareStrings");
	if(str.length == 0) {
		alert("loL");
	}	
	else {
        	var xxmlhttp = new XMLHttpRequest();
        	xxmlhttp.onreadystatechange = function() {
            	
		if (this.readyState == 4 && this.status == 200) {
			console.log("Comparetostrings Innerbody" + this.responseText );				
			return this.responseText == "true" ? true : false;			
            	}
        	}; //.open the second parameter is false
        
	xxmlhttp.open("GET", "../PHP/searchkeyword.php?key=" + str + "&user=" + document.getElementById("userData").value, false);
	//alert(xxmlhttp.readyState);         
	 xxmlhttp.send();
	//alert(xxmlhttp.readyState);  
	console.log("Searchkeyword response: " + xxmlhttp.readyState + xxmlhttp.responseText );
		
	return xxmlhttp.responseText == "true" ? true : false;
	}
}
