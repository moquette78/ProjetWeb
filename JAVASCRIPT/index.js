
$(document).ready(function(){

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
        e.preventDefault();   // l'action du submit n'est pas delenchée, on doit dabord faire des verification
        
        $.post(
            '../PHP/connexion.php', // pour valider la connexion
            {
                pseudo : $("#pseudoc").val(),  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
                mdp : $("#mdpc").val()
            },
 
            function(data){
 
                if(data == 'Success'){
                     // Le membre est connecté. Ajoutons lui un message dans la page HTML.
 
                     document.location.href="website.php";
                }
                else{
                     // Le membre n'a pas été connecté. (data vaut ici "failed")
 
                     $("#resultatc").html("<p>Erreur lors de la connexion...</p>");
                }
         
            },
            'text'
         );
    });

    $("#submiti").click(function(e){  // lorsque l'on click sur le bouton d'envoie
        e.preventDefault();   // l'action du submit n'est pas delenchée, on doit dabord faire des verification
    
    if ($("#pseudoi").val()=="") {
        $("#resultati").html("<p>Pseudo invalide</p>");
    }
    else if ($("#mdpi").val()=="") {
        $("#resultati").html("<p>Vous devez rentrer un mot de passe</p>");
    }
    else{
        $.post(
            '../PHP/inscription.php', // Un script PHP que l'on va créer juste après
            {
                pseudo : $("#pseudoi").val(),  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
                mdp : $("#mdpi").val()
            },
 
            function(data){
 
                if(data == 'Success'){
                     document.location.href="website.php"; 
                }
                else{
                     // Le membre n'a pas été connecté. (data vaut ici "failed")
 
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
                '../PHP/pseudodispo.php', // pour valider la connexion
            {
                pseudo : pseudo
            },
 
            function(data){
 
                if(data == 'Success'){
                     // Le membre est connecté. Ajoutons lui un message dans la page HTML.
 
                    $('#pseudoi').css('background-color','rgba(255, 0, 0, 0.5)');
                }
                else{
                     // Le membre n'a pas été connecté. (data vaut ici "failed")
 
                     $('#pseudoi').css('background-color','rgba(0, 255, 0, 0.5)');
                }
         
            },
            'text'
         );


                
            }
        });

});

