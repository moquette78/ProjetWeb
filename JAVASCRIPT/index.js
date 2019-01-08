
$(document).ready(function(){
	// lorsque le curseur est dans le input on colorise le label en rouge
    $("#pseudoi").focus(function(){
        $("#forpseudoi").css("color", "red");
    });
    $("#pseudoi").focusout(function(){
        $("#forpseudoi").css("color", "black");
    });
    $("#mdpi").focus(function(){
        $("#formdpi").css("color", "red");
    });
    $("#mdpi").focusout(function(){
        $("#formdpi").css("color", "black");
    });

    $("#pseudoc").focus(function(){
        $("#forpseudoc").css("color", "red");
    });
    $("#pseudoc").focusout(function(){
        $("#forpseudoc").css("color", "black");
    });
    $("#mdpc").focus(function(){
        $("#formdpc").css("color", "red");
    });
    $("#mdpc").focusout(function(){
        $("#formdpc").css("color", "black");
    });
 
    $("#submitc").click(function(e){  // lorsque l'on click sur le bouton d'envoie
        e.preventDefault();   // l'action du submit n'est pas delenchée, on doit dabord faire des verifications
        
        $.post(
            '../PHP/connexion.php', // pour valider la connexion
            {
                pseudo : $("#pseudoc").val(),  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
                mdp : $("#mdpc").val()
            },
 
            function(data){
 
                if(data == 'Success'){
                     // connexion ok donc on redirige vers website.php
 
                     document.location.href="website.php";
                }
                else{
                     // echec de connexion donc on affiche un message d'echec
 
                     $("#resultatc").html("<p>Erreur lors de la connexion...</p>");
                }
         
            },
            'text'
         );
    });

    $("#submiti").click(function(e){  
        e.preventDefault();
    
    if ($("#pseudoi").val()=="") {
        $("#resultati").html("<p>Pseudo invalide</p>");
    }
    else if ($("#mdpi").val()=="") {   
        $("#resultati").html("<p>Vous devez rentrer un mot de passe</p>");  //si le pseudo est vide on affiche une erreur
    }
    else{
        $.post(
            '../PHP/inscription.php', // Pour valider l'inscription
            {
                pseudo : $("#pseudoi").val(),  // Nous récupérons la valeur de nos input que l'on fait passer à inscripion.php
                mdp : $("#mdpi").val()
            },
 
            function(data){
 
                if(data == 'Success'){
                     document.location.href="website.php"; 
                }
                else{
                     // Si inscription.php retourne failed alors le pseudo existe deja
 
                     $("#resultati").html("<p>Pseudo deja existant ...</p>");
                }
         
            },
            'text'
         );
    }
    });

    $('#pseudoi').on('input',function() {

            var pseudo = $('#pseudoi').val();
            if (pseudo !=""){

                $.post(
                '../PHP/pseudodispo.php', // on utilise php pour savoir si le pseudo est disponible
            {
                pseudo : pseudo
            },
 
            function(data){
 
                if(data == 'Success'){
                     //Le pseudo n'est pas disbonible donc on met le background en rouge
 
                    $('#pseudoi').css('background-color','rgba(255, 0, 0, 0.5)');
                }
                else{
                     // pseudo disponible donc background en vert
 
                     $('#pseudoi').css('background-color','rgba(0, 255, 0, 0.5)');
                }
         
            },
            'text'
         );


                
            }
        });

});

