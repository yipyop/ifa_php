<?php
    

    var_dump( $_POST);

    require 'fonctions.php';

    if( !empty($_POST) ) {
        $formulaire = array();
        $erreurs = array();
    }

    if( !empty($_POST) ) foreach ( $_POST as $key => $value ) {
        $post = explode('-', $key );

        if( $post[0] == 'etat_civil' ) {
            if( $post[1] == 'conjoint' ) {

                if( POST_exist($key) ) {
                    if( $post[2] == 'email' ){
                        $formulaire[$post[0]][$post[1]][$post[2]] = POST_email_type($key);
                    }
                    elseif ( $post[2] == 'date_naissance' && POST_date($key) ) {
                        $formulaire[$post[0]][$post[1]][$post[2]] = $_POST[$key];
                    }
                    else {
                        $formulaire[$post[0]][$post[1]][$post[2]] = POST_data_types($key);
                    }
                }
                else {
                    $erreurs[$post[0]][$post[1]][$post[2]] = false;
                }


                
            }
            elseif( $post[1] == 'enfant' ) {
                if( POST_exist($key) ) {
                    if ( $post[3] == 'date_naissance' && POST_date($key) ) {
                        $formulaire[$post[0]][$post[1]][$post[2]][$post[3]] = $_POST[$key];
                    }
                    else {
                        $formulaire[$post[0]][$post[1]][$post[2]][$post[3]] = POST_data_types($key);
                    
                    }
                    
                }
            }    
            else {

                if( POST_exist($key) ) {
                    if( $post[1] == 'email' ){
                        $formulaire[$post[0]]['vous'][$post[1]] = POST_email_type($key);
                    }
                    elseif ( $post[1] == 'date_naissance' ) {
                        $formulaire[$post[0]]['vous'][$post[1]] = POST_date($key);
                    }
                    else {
                        $formulaire[$post[0]]['vous'][$post[1]] = POST_data_types($key);
                    }
                }
                else {
                    $erreurs[$post[0]]['vous'][$post[1]] = false;
                }

                    
            }

            
        }
        elseif( $post[0] == 'credit' ) {
            if ( $post[2] == 'date_fin_mensualite' && POST_date($key) ) {
                $formulaire[$post[0]][$post[1]][$post[2]] = $_POST[$key];
            }
            else {
                $formulaire[$post[0]][$post[1]][$post[2]] = POST_data_types($key);  
            }
        }
        elseif( $post[0] == 'fiscalite' ) {

            if( $post[1] == 'conjoint' ) {

                if( POST_exist($key) ) {
                    if( $post[2] == 'email' ){
                        $formulaire[$post[0]][$post[1]][$post[2]] = POST_email_type($key);
                    }
                    elseif ( $post[2] == 'date_naissance' && POST_date($key) ) {
                        $formulaire[$post[0]][$post[1]][$post[2]] = $_POST[$key];
                    }
                    else {
                        $formulaire[$post[0]][$post[1]][$post[2]] = POST_data_types($key);
                    }
                }
                else {
                    $erreurs[$post[0]][$post[1]][$post[2]] = false;
                }


                
            }
            else {

                if( POST_exist($key) ) {
                    if( $post[1] == 'email' ){
                        $formulaire[$post[0]]['vous'][$post[1]] = POST_email_type($key);
                    }
                    elseif ( $post[1] == 'date_naissance' ) {
                        $formulaire[$post[0]]['vous'][$post[1]] = POST_date($key);
                    }
                    else {
                        $formulaire[$post[0]]['vous'][$post[1]] = POST_data_types($key);
                    }
                }
                else {
                    $erreurs[$post[0]]['vous'][$post[1]] = false;
                }

                    
            }
        }
        

    }

    if( !empty($_POST) ) {

    

        if( count($formulaire['etat_civil']['vous'] ) != 15 ) $erreurs['etat_civil']['vous']['nombre_champs'] = 'Il manque un champs';
        if( isset($formulaire['etat_civil']['conjoint']) && count($formulaire['etat_civil']['conjoint'] ) != 15 ) $erreurs['etat_civil']['conjoint']['nombre_champs'] = 'Il manque un champs';
        
        $array_client_luxembourg = false;
        $array_client_france = false;

        
        if( $formulaire['etat_civil']['vous']['nationalite'] == 'france' )  {
            $array_client_luxembourg = $formulaire;
        }
        elseif( $formulaire['etat_civil']['vous']['nationalite'] == 'luxembourg' ) {
            $array_client_france = $formulaire;
        }


        
        $erreurs['etat_civil']['vous']['nombre_champs'] = 'Il manque un champs';
        

        var_dump( $formulaire, $erreurs );
    }
?>