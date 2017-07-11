<?php
    // Christophe -Johan - Isabelle - Pascal

    require 'fonctions.php';
    
    $formulaire = false;
    $erreurs = false;
    

    if( !empty( $_POST ) ) foreach ( $_POST as $key => $value ) {
        $post = explode('-', $key );

        if( $post[0] == 'etat_civil' ) {

            if( $post[1] == 'conjoint' ) {

                $valeur = test_etat_civil_conjoint($key, $value, $post);  

                $valeur = test_etat_civil_conjoint($key, $value, $post);
                if( substr( $valeur, 0, 6) == 'erreur' ) {
                    $erreurs[$post[0]][$post[1]][$post[2]] = $valeur;
                }
                elseif( !is_null($valeur)) {
                    $formulaire[$post[0]][$post[1]][$post[2]] = $valeur; 
                }

                
                
            }
            elseif( $post[1] == 'enfant' ) {


                $valeur = test_etat_civil_enfant($key, $value, $post);
                
                if( substr( $valeur, 0, 6) == 'erreur' ) {
                    $erreurs[$post[0]][$post[1]][$post[2]][$post[3]] = $valeur;
                }
                elseif( !is_null($valeur)) {
                    $formulaire[$post[0]][$post[1]][$post[2]][$post[3]] = $valeur; 
                }   



            }    
            else {
                $valeur = test_etat_civil_vous($key, $value, $post);

                if( substr( $valeur, 0, 6) == 'erreur' ) {
                    $erreurs[$post[0]]['vous'][$post[1]] = $valeur;
                }
                elseif( !is_null($valeur)) {
                    $formulaire[$post[0]]['vous'][$post[1]] = $valeur; 
                }
                
                
                    
            }

        }
        elseif( $post[0] == 'credit' ) {
            $valeur = test_credit($key, $value, $post);  

            if( substr( $valeur, 0, 6) == 'erreur' ) {
                $erreurs[$post[0]][$post[1]][$post[2]] = $valeur;
            }
            elseif( !is_null($valeur)) {
                $formulaire[$post[0]][$post[1]][$post[2]] = $valeur;
            }
            
        }

        elseif( $post[0] == 'fiscalite' ) {

            if( $post[1] == 'conjoint' ) {

                $valeur = test_fiscalite_conjoint($key, $value, $post);  

                if( substr( $valeur, 0, 6) == 'erreur' ) {
                    $erreurs[$post[0]][$post[1]][$post[2]] = $valeur;
                }
                elseif( !is_null($valeur)) {
                    $formulaire[$post[0]][$post[1]][$post[2]] = $valeur;
                }
               
            }
            else {
                
                $valeur = test_fiscalite_vous($key, $value, $post);  

                if( substr( $valeur, 0, 6) == 'erreur' ) {
                    $erreurs[$post[0]]['vous'][$post[1]] = $valeur;
                }
                elseif( !is_null($valeur)) {
                    $formulaire[$post[0]]['vous'][$post[1]] = $valeur;
                }
                    
            }
        }
        

    }

    
        
        $array_client_luxembourg = false;
        $array_client_france = false;

        if( $formulaire['etat_civil']['vous']['nationalite'] == 'france' )  {
            $array_client_luxembourg = $formulaire;
        }
        elseif( $formulaire['etat_civil']['vous']['nationalite'] == 'luxembourg' ) {
            $array_client_france = $formulaire;
        }
         
    
?>