

var utilisateurs = {

    
    listerTousLesUtilisateurs : function(fichierJSON, box, html){

        //recuperation du fichier json
        $.getJSON( fichierJSON, function( data ) {

            //on initialise la variable d'affichage des données
            var items = [];

            //boucle les résultats du fichier Json
            $.each( data, function( key, val ) {
                
                //attribut la valeur à la class nom
                $(box).children( '.nom').html(  'nom : ' + val['nom'] );

                //attribut la valeur à la class prénom
                $(box).children( '.prenom').html(  'prenom : ' + val['prenom'] );

                //attribut les valeurs au lien vers le profil
                $(box).children( 'a').attr( 'href', 'utilisateur.html?nom=' + encodeURIComponent( val['nom'].toLowerCase() ) + '&prenom=' + encodeURIComponent( val['prenom'].toLowerCase() ) );
                $(box).children( 'a').html( 'voir le profil' );
                
                //concatene la valeur html de la variable d'affichage
                items += box.wrapAll('<div>').parent().html();
                
            });
            
            //supprime le modele d'affichage
            box.remove();

            //affiche les resultats dans la div prévue
            html.append(items).css('display', 'block');
            
            
        });


    },

    listerUtilisateurUnique : function(fichierJSON, nom, prenom){
        
        //recuperation du fichier json
        $.getJSON( fichierJSON, function( data ) {
            
            //boucle les résultats du fichier Json
            $.each( data, function( key, val ) {
                
                //on verifie le nom et prenom pour stopper la boucle au profil demandé
                if( val['nom'].toLowerCase() == decodeURIComponent(nom) && val['prenom'].toLowerCase() == decodeURIComponent(prenom)  ) {
                    
                    //on liste les valeurs du profil demandé
                    $.each( val, function( key2, val2 ) {
                        
                        //on affiche la clé et la valeur de la forme cle en gras : valeur
                        $('.'+ key2).html('<strong>' + key2.replace('_', ' ') + ' : </strong>' + val2);
                        
                    });

                
                }
                
                
            });
            
            
        });

    },

    listerMonProfil : function(fichierJSON, nom, prenom){
        
        //recuperation du fichier json
        $.getJSON( fichierJSON, function( data ) {
            
            //boucle les résultats du fichier Json
            $.each( data, function( key, val ) {
                id = key;
                //on verifie le nom et prenom pour stopper la boucle au profil demandé
                if( val['nom'].toLowerCase() == decodeURIComponent(nom) && val['prenom'].toLowerCase() == decodeURIComponent(prenom)  ) {

                    //on boucle les valeurs du profil
                    $.each( val, function( key, val ) {
                        //$('.'+ key).html(key.replace('_', ' ') + ' : ' + val);
                        //on attribut la valeur de la clé au label
                        $("label[for='"+ key +"']").html( key + ' : ');

                        //on ajoute les attribut a la balise input
                        $('.'+ key).attr('name', key);
                        $('.'+ key).attr('value', val);
                        $('.'+ key).attr('placeholder', key + ' à remplir');

                       
                        
                    });

                    //on stoppe la boucle des résultats du fichier Json
                    return false;
                }
                
                
                
            });
            
            
        });

    },    
    
    recupererIdProfil : function(fichierJSON, nom, prenom){
        
        //recuperation du fichier json
        $.getJSON( fichierJSON, function( data ) {
            
            //on liste les utilisateurs
            $.each( data, function( key, val ) {
                
                //on verifie que le nom et prenom soit l'utilisateur demandé
                if( val['nom'].toLowerCase() == decodeURIComponent(nom) && val['prenom'].toLowerCase() == decodeURIComponent(prenom)  ) {
                     
                     //on assigne la variable id à la clé du tableau json à la variable id
                     id = jQuery.parseJSON(key);
                     return false;
                      
                }
                
                
            });
            
           
        });
        

    }    
    

};
