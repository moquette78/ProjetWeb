//Code from Nadime Barhoumi and Giovanni Simon 


  //Global values for recording

  var c;
  var ctx;
  var sizeofgraph = 180; //this value needs the same as the value from the html document
  var arrX = ["0"];
  var arrY = ["0"];
  var arrZ = ["0"];
  var second = 0;  
  var x = 0;
  var y = 0;
  var z = 0;
  var a = 0;
  var b = 0;
  var c = 0;
  var arrA = ["0"];
  var arrB = ["0"];
  var arrC = ["0"];
  var countSeconds = 0;
  var idCountSeconds = 0;
  var SpeedOfRegister = 100; //for the function RegisterData
  var registerDataId = 0;
 
//Get the values for of the moving portable
  var movements = function(event) {
    
    console.log(event.acceleration.x + ' m/s2');
    x = Math.trunc(event.accelerationIncludingGravity.x);
    y = Math.trunc(event.accelerationIncludingGravity.y);
    z = Math.trunc(event.accelerationIncludingGravity.z);
    document.getElementById("demoX").innerHTML = x //Math.trunc(event.accelerationIncludingGravity.x);
    document.getElementById("demoY").innerHTML = y//Math.trunc(event.accelerationIncludingGravity.y);
    document.getElementById("demoZ").innerHTML = z //Math.trunc(event.accelerationIncludingGravity.z);
  }

//This function will be called all 'second' time, it adds the values to the arrays
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

  }
//Same as countUp
  function process(event) {
  a = Math.trunc(event.alpha);
  b = Math.trunc(event.beta);
  c = Math.trunc(event.gamma);
    document.getElementById("demoA").innerHTML = a;
    document.getElementById("demoB").innerHTML = b;
    document.getElementById("demoC").innerHTML = c; 
}


//Prepares everything for the function without a countdown
  function sansRedardeteur() { 

    if (window.DeviceOrientationEvent) {
    document.getElementById("startSansRetardateur").innerHTML = "<br>Start enregistrer ";
    document.getElementById('startAvecRetardateur').remove();
    document.getElementById('AvecButton').remove();
    document.getElementById('SansButton').remove();
    
    //Adds listener
    window.addEventListener('devicemotion',movements);
    window.addEventListener("deviceorientation", process, false);
    registerData();
    registerSeconds();
    }
    else {
    document.getElementById("startSansRetardateur").innerHTML = "Register not possible ";
    }
  }



//Prepares everything for the function with a countdown
  function avecRedardateur() {


//Installing the 3 second timer    
  document.getElementById("countdowntimer").textContent = "Decompte: " +   3;

    var timeleft = 3;
      var downloadTimer = setInterval(function(){
      timeleft--;
      document.getElementById("countdowntimer").textContent ="Decompte: " +  timeleft;
      if(timeleft <= 0)clearInterval(downloadTimer);
      },1000);    


  //Prepares everything for the recording
  setTimeout(function(){ 
    
      if (window.DeviceOrientationEvent) {
    
      document.getElementById('startSansRetardateur').remove();
      document.getElementById('SansButton').remove();
      document.getElementById('AvecButton').remove();
      document.getElementById("countdowntimer").remove();
      document.getElementById("startAvecRetardateur").innerHTML = "<br>Start enregistrer avec un retardateur de 3 secondes";
      window.addEventListener('devicemotion', movements);
      window.addEventListener("deviceorientation", process, false);
      registerData();
      registerSeconds();
      
    }
  else {
       document.getElementById("startSansRetardateur").innerHTML = "Register not possible ";
      } 
    
  },3000);

     
   
     
  }

//Installing a intervall which will be called all "SpeedoFRegister"
  function registerData(){
      registerDataId = setInterval(function(){
                          countUp();
                        }, SpeedOfRegister); //SpeedOfRegister = 100; so it calls every 1/10 seconds countUP();
    
  }

//Same as RegisterData
  function registerSeconds(){
      idCountSeconds = setInterval(function(){
                          countSeconds++;
			            document.getElementById("count-up").innerText = "Seconds: " + countSeconds;
                        }, 1000); //SpeedOfRegister = 1000; so it calls every second countUP();
    
  }

//Getting the HTML Tag for drawing the graphes for each value 
  function drawGraphX() {
     
    c = document.getElementById("myX");
    ctx = c.getContext("2d");
    
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
   function drawGraphA() {
    

    c = document.getElementById("myA");
    ctx = c.getContext("2d");
    ctx.moveTo(0, sizeofgraph/2);
    ctx.lineTo(sizeofgraph,sizeofgraph/2);
    ctx.moveTo(0, sizeofgraph/2);
   

    for(var i = 0; i < arrA.length; i++){
  	ctx.lineTo(i, (sizeofgraph/2) - parseInt(arrA[i],10)/4);
	
  	}

    ctx.lineWidth = 1;
    ctx.strokeStyle = '#ff69b4';
    ctx.stroke(); 
  }

  function drawGraphB() {
    

    c = document.getElementById("myB");
    ctx = c.getContext("2d");
    ctx.moveTo(0, sizeofgraph/2);
    ctx.lineTo(sizeofgraph,sizeofgraph/2);
    ctx.moveTo(0, sizeofgraph/2);
   

    for(var i = 0; i < arrB.length; i++){
  	ctx.lineTo(i, (sizeofgraph/2)- parseInt(arrB[i],10)/2);

  	}

    ctx.lineWidth = 1;
    ctx.strokeStyle = '#558050';
    ctx.stroke(); 
  }

  function drawGraphC() {
    

    c = document.getElementById("myC");
    ctx = c.getContext("2d");
    ctx.moveTo(0, sizeofgraph/2);
    ctx.lineTo(sizeofgraph,sizeofgraph/2);
    ctx.moveTo(0, sizeofgraph/2);
   

    for(var i = 0; i < arrC.length; i++){
  	ctx.lineTo(i, (sizeofgraph/2)- parseInt(arrC[i],10)/2);

  	}

    ctx.lineWidth = 1;
    ctx.strokeStyle = '#908010';
    ctx.stroke(); 
  }

//Cleans up and is stopping the intervalls. 
  function stopRecording(){

  window.removeEventListener('devicemotion',movements);
  window.removeEventListener("deviceorientation", process);
  clearInterval(registerDataId);
  clearInterval(idCountSeconds);
  document.getElementById("stopButton").remove();
  
  drawGraphX();
  drawGraphY();
  drawGraphZ();   
  drawGraphA();
  drawGraphB();
  drawGraphC();
  //console.log(arrA);
  }


//Calls a PHP (envoi) page for safing the data.
function sendDonnees(){

if(document.getElementById("keyword").value === ""){
     
     document.getElementById("description_data").innerHTML = "Keyword can't be empty";
   } else{

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
	  'seconds': countSeconds,
          'keyword' : $("#keyword").val()
      },
      success: function(msg){
	document.getElementById("description_data").innerHTML = "Data are sended";
	document.getElementById('sendButton').remove();
	document.getElementById('keyword').remove();
  },
  error: function(XMLHttpRequest, textStatus, errorThrown) {
     alert("some error");
  } 
    });
   }  
}



//Is for the gethint.php, shows if user input has matching keywords in our database and gives the user suggestions
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


//Check if the keyword the user entered is a matching keyword in our database
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

//Shows the bottom part of website.php if the recording was ended 
$(document).ready(function(){

    $("#stopButton").click(function(e){
        $("#sendingData").removeAttr("hidden");
	});
    });
