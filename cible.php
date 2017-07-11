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
                        $valeur = POST_data_types($key);

                        $int = array('age', 'code_postal', 'telephone', 'gsm', 'revenus');
                        
                        if ( in_array( $post[2], $int) ) {
                            !is_int( $valeur ) ? $erreurs[$post[0]][$post[1]][$post[2]] = 'ce champs doit être un nombre' : $formulaire[$post[0]][$post[1]][$post[2]] = $valeur;
                        }
                        else {
                            !is_string( $valeur ) ? $erreurs[$post[0]][$post[1]][$post[2]] = 'ce champs doit être une chaine de caractère' : $formulaire[$post[0]][$post[1]][$post[2]] = $valeur;  
                        }
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
                        $valeur = POST_data_types($key);
                        !is_string( $valeur ) ? $erreurs[$post[0]][$post[1]][$post[2]][$post[3]] = false : $formulaire[$post[0]][$post[1]][$post[2]][$post[3]] = $valeur;  
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
                    
                        $valeur = POST_data_types($key);

                        $int = array('age', 'code_postal', 'telephone', 'gsm', 'revenus');
                        
                        if ( in_array( $post[1], $int) ) {
                            !is_int( $valeur ) ? $erreurs[$post[0]]['vous'][$post[1]] = 'ce champs doit être un nombre' : $formulaire[$post[0]]['vous'][$post[1]] = $valeur;
                        }
                        else {
                            !is_string( $valeur ) ? $erreurs[$post[0]]['vous'][$post[1]] = false : $formulaire[$post[0]]['vous'][$post[1]] = $valeur;    
                        }
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
                $int = array( 'montant_mensualite', 'taux', 'capital_restant', 'capital_emprunte' );
                
                if( in_array($post[2], $int ) ){
                    if( is_int( POST_data_types($key) ) || is_float( POST_data_types($key) ) ) {
                        $formulaire[$post[0]][$post[1]][$post[2]] = POST_data_types($key);   
                    }
                    else {
                        $erreurs[$post[0]][$post[1]][$post[2]] = 'Ce champs doit être un chiffre';    
                    }
                }
                elseif( $post[2] == 'type_credit') {
                    $select = array( 'pret-personnel', 'pret-immobilier', 'pret-travaux' );
                    if( !in_array( POST_data_types($key), $checkbox ) ) {
                        $erreurs[$post[0]][$post[1]][$post[2]] = 'valeur invalide';  
                    }
                    elseif ( !is_string($POST_data_types($key)) ) {
                        $erreurs[$post[0]][$post[1]][$post[2]] = 'valeur invalide';
                    }
                    else {
                        $formulaire[$post[0]][$post[1]][$post[2]] = $POST_data_types($key);    
                    }        
                }
                else{
                    if( is_string( POST_data_types($key) ) ) {
                        $formulaire[$post[0]][$post[1]][$post[2]] = POST_data_types($key);   
                    }
                    else {
                        $erreurs[$post[0]][$post[1]][$post[2]] = 'Ce champs doit être un chaîne de caractère';    
                    }    
                }
            }
        }
        elseif( $post[0] == 'fiscalite' ) {

            if( $post[1] == 'conjoint' ) {

                if( $post[2] == 'montant_impots') {
                    $valeur = POST_data_types($key);
                    if( is_int( POST_data_types($key) ) || is_float( POST_data_types($key) ) ) {
                        $formulaire[$post[0]][$post[1]][$post[2]] = $POST_data_types($key);
                    } 
                    else {
                        $erreurs[$post[0]][$post[1]][$post[2]] = 'Ce champs doit être un chiffre';  
                    }          
                }
                else {
                    
                    $checkbox = array( 'EL', 'fA110', 'fA111', '111B', 'SRD' );
                    if ( $post[2] == 'declaration' && $value == 'oui' ) {
                        if( !in_array( POST_data_types($key), $checkbox ) ) {
                            $erreurs[$post[0]][$post[1]][$post[2]] = 'valeur invalide';  
                        }
                        else {
                            $formulaire[$post[0]][$post[1]][$post[2]] = $POST_data_types($key);   
                        }
                    }
                    elseif ( $post[2] == 'declaration' && $value == 'non' ) {
                        if( !in_array( POST_data_types($key), array( 'oui', 'non') ) ) {
                            $erreurs[$post[0]][$post[1]][$post[2]] = 'valeur invalide';  
                        }
                        else {
                            $formulaire[$post[0]][$post[1]][$post[2]] = $POST_data_types($key);   
                        }    
                    }
                }        
               


                
            }
            else {

                if( POST_exist($key) ) {

                    if( $post[1] == 'montant_impots') {
                        $valeur = POST_data_types($key);
                        if( is_int($valeur) || is_float($valeur) ) {
                            $formulaire[$post[0]]['vous'][$post[1]] = $valeur;
                        } 
                        else {
                            $erreurs[$post[0]]['vous'][$post[1]] = 'doit être un chiffre';  
                        }          
                    }
                    else {
                        
                        $checkbox = array( 'EL', 'fA110', 'fA111', '111B', 'SRD' );
                        if ( $post[2] == 'declaration' && $value == 'oui' ) {
                            if( !in_array( $value, $checkbox ) ) {
                                $erreurs[$post[0]]['vous'][$post[1]] = 'valeur invalide';  
                            }
                            else {
                                $formulaire[$post[0]]['vous'][$post[1]] = $valeur;   
                            }
                        }
                        elseif ( $post[2] == 'declaration' && $value == 'non' ) {
                            if( !in_array( $value, array( 'oui', 'non') ) ) {
                                $erreurs[$post[0]]['vous'][$post[1]] = 'valeur invalide';  
                            }
                            else {
                                $formulaire[$post[0]]['vous'][$post[1]] = $valeur;   
                            }    
                        }
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
        var_dump( $array_client_france, $array_client_luxembourg );
    }
?>