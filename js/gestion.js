

var gestion = {
	
	redirectionIndex : function(url){

        if( url == '' ) document.location.href="index.html";

    },
	recupererGET : function(valeur){

        //on traite dans une REGEX la recupération de valeur passé dans les variables $_GET
        var results = new RegExp('[\?&]' + valeur + '=([^&#]*)').exec(window.location.href);
        
        //on retourne le résultat de results sinon 0
	    return results[1] || 0;

    }

};

$(document).ready( function(){

    //si l'URI est vide on redirige vers index.html
    var url = document.location.href.substring(document.location.href.lastIndexOf( "/" )+1 );
    gestion.redirectionIndex(url);

})