<?php
    
    require 'fonctions.php';
    var_dump( $_POST);

    if( isset($_POST['test']) && $_POST['test'] ) {
        var_dump( POST_data_types('test') ) ; exit;  
    }

    

    if( !empty($_POST) ) {
        $formulaire = array();
        $erreurs = array();
    }

    if( !empty($_POST) ) foreach ( $_POST as $key => $value ) {
        $post = explode('-', $key );

        if( $post[0] == 'etat_civil' ) {

            if( $post[1] == 'conjoint' ) {

                test_etat_civil_conjoint($key, $value, $post);  
                
            }
            elseif( $post[1] == 'enfant' ) {
                test_etat_civil_enfant($key, $value, $post);    
            }    
            else {

                test_etat_civil_vous($key, $value, $post);  

                    
            }

            
        }
        elseif( $post[0] == 'credit' ) {
            test_credit($key, $value, $post);     
        }
        elseif( $post[0] == 'fiscalite' ) {

            if( $post[1] == 'conjoint' ) {

                fiscalite_conjoint($key, $value, $post);  
               
            }
            else {

               fiscalite_vous($key, $value, $post);  

                    
            }
        }
        

    }

    if( !empty($_POST) ) {

    

        if( count($formulaire['etat_civil']['vous'] ) != 15 ) $erreurs['etat_civil']['vous']['general'] = 'Il manque un champs';
        if( isset($formulaire['etat_civil']['conjoint']) && count($formulaire['etat_civil']['conjoint'] ) != 15 ) $erreurs['etat_civil']['conjoint']['general'] = 'Il manque un champs';
        
        $array_client_luxembourg = false;
        $array_client_france = false;

        if( empty( $erreurs) ) {
            if( $formulaire['etat_civil']['vous']['nationalite'] == 'france' )  {
            $array_client_luxembourg = $formulaire;
            }
            elseif( $formulaire['etat_civil']['vous']['nationalite'] == 'luxembourg' ) {
                $array_client_france = $formulaire;
            }
            var_dump( $array_client_france, $array_client_luxembourg );
        }
        else {
            var_dump( $formulaire, $erreurs );
        }

        
        
        

        
        
    }
?>