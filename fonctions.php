<?php
    // Christophe -Johan - Isabelle - Pascal

    //fonction de test de l'existance des variables
    function POST_exist( $post_key ) {
        return isset( $_POST[$post_key] ) ? $_POST[$post_key] : false;
    }

    //fonction de test du datatype
    function POST_data_types( $post_key ) {
        
        if( is_numeric( $_POST[$post_key] ) ) {
            
            if (strpos($_POST[$post_key],'.') !== false) {
                return (float) $_POST[$post_key];
            }
            else {
                return (int) $_POST[$post_key];
            }    
        } 
        elseif( is_string( $_POST[$post_key] ) ) {
            return (string) $_POST[$post_key];
        }
        else {
            return false;
        }
    }
    //fonction de test de l'adresse email
    function POST_email_type( $post_key ) {
        if (filter_var($_POST[$post_key], FILTER_VALIDATE_EMAIL)) {
            return $_POST[$post_key];
        }
        else {
            return false;
        }
    }

    //fonction de test de la date
    function POST_date( $post_key, $format = 'Y-m-d') {

        $d = DateTime::createFromFormat($format, $_POST[$post_key]);
        return $d && $d->format($format) == $_POST[$post_key];

    }

    
    //fonction testant la partie état civil de la personne remplissant le formulaire.

    function test_etat_civil_vous($key, $value, $explode_post) {
            $erreur = array();
            if( !POST_exist($key) ) return 'erreur : valeur manquante';

            if( $explode_post[1] == 'email' ){
                return POST_email_type($key);
            }
            elseif ( $explode_post[1] == 'date_naissance' ) {
                return POST_date($key);
            }
            else {
               
                $valeur = POST_data_types($key);

                $int = array('age', 'code_postal', 'telephone', 'gsm', 'revenus');
                
                if ( in_array( $explode_post[1], $int) ) {
                    return !is_int( POST_data_types($key) ) ?  'erreur : ce champs doit être un nombre' :  POST_data_types($key);
                }
                else {
                    return !is_string( POST_data_types($key) ) ?  'erreur : Ce champs doit être une chaîne de caractère' :  POST_data_types($key);    
                }
            }

        
            
        
    }

    //fonction testant la partie état civil du conjoint du formulaire.

    function test_etat_civil_conjoint($key, $value, $explode_post) {
        
        if( POST_exist($key) && $explode_post[2] == 'email' ){
            if( !POST_email_type($key) ) {
                return 'erreur : email invalide';                
            } 
            else {
                return POST_email_type($key);  
            }
        }
        if ( POST_exist($key) && $explode_post[2] == 'date_naissance' && POST_date($key) ) {
            return $_POST[$key];
        }
        elseif (POST_exist($key) &&  $explode_post[2] == 'date_naissance' && !POST_date($key) ) {
            return 'erreur : date_naissance invalide';
        }
        else{
            if( POST_exist($key) )  {
                $valeur = POST_data_types($key);

                $int = array('age', 'code_postal', 'telephone', 'gsm', 'revenus');
                
                if ( in_array( $explode_post[2], $int) ) {
                    return !is_int( $valeur) ? $erreur['erreur'] = 'erreur : Ce champs doit être un nombre' :  $valeur;
                }
                else {
                    return !is_string( $valeur ) ? 'erreur : Ce champs doit être une chaine de caractère' :  $valeur;  
                }
            }
        
        }
        

    }

    //fonction testant la partie état civil des enfants du formulaire.

    function test_etat_civil_enfant($key, $value, $explode_post) {
        
        if(  POST_exist($key) != '' ) {
            if ( $explode_post[3] == 'date_naissance' && POST_date($key) ) {
                return POST_date($key);
            }
            else {            
                return !is_string( POST_data_types($key) ) ? 'erreur : Ce champs doit être une chaine de caractère' :  POST_data_types($key);  
            }
        }
        
            
    }

    //fonction testant la partie crédit du formulaire.

    function test_credit($key, $value, $explode_post) {
        
        if( POST_exist($key) ) {
            if ( $explode_post[2] == 'date_fin_mensualite' && POST_date($key) ) {
                return $_POST[$key];
            }
            else {
                $int = array( 'montant_mensualite', 'taux', 'capital_restant', 'capital_emprunte' );
                
                if( in_array($explode_post[2], $int ) ){
                    if( is_int( POST_data_types($key) ) || is_float( POST_data_types($key) ) ) {
                        return POST_data_types($key);   
                    }
                    else {
                        return 'erreur : Ce champs doit être un chiffre';    
                    }
                }
                elseif( $explode_post[2] == 'type_credit') {
                    $select = array( 'pret-personnel', 'pret-immobilier', 'pret-travaux' );
                    if( !in_array( $value, $select ) ) {
                        return 'erreur : valeur invalide';  
                    }
                    elseif ( !is_string( POST_data_types($key)) ) {
                        return 'erreur : valeur invalide';
                    }
                    else {
                        return POST_data_types($key);    
                    }        
                }
                else{
                    if( is_string( POST_data_types($key) ) ) {
                        return POST_data_types($key);   
                    }
                    else {
                        'erreur : Ce champs doit être un chaîne de caractère';    
                    }    
                }
            }
        }
            
    }

    //fonction testant la partie fiscalité de la personne remplissant le formulaire.

    function test_fiscalite_vous($key, $value, $explode_post) {

        if( POST_exist($key) ) {

            if( $explode_post[1] == 'montant_impots') {
                $valeur = POST_data_types($key);
                if( is_int($valeur) || is_float($valeur) ) {
                    return $valeur;
                } 
                else {
                    return 'erreur : doit être un chiffre';  
                }          
            }
            else {
                
                $checkbox = array( 'EL', 'fA110', 'fA111', '111B', 'SRD' );
                if ( $explode_post[1] == 'declaration' && $value == 'oui' ) {
                    if( !in_array( $value, $checkbox ) ) {
                        return 'erreur : valeur invalide';  
                    }
                    else {
                        return $valeur;   
                    }
                }
                elseif ( $explode_post[1] == 'declaration' && $value == 'non' ) {
                    if( !in_array( $value, array( 'oui', 'non') ) ) {
                       return 'erreur : valeur invalide';  
                    }
                    else {
                        return $valeur;   
                    }    
                }
            }        

            
        }
        

    }
    //fonction testant la partie fiscalité du conjoint du formulaire.

    function test_fiscalite_conjoint($key, $value, $explode_post) {
        if( $explode_post[2] == 'montant_impots') {
            if( POST_exist( $key ) ) {
                $valeur = POST_data_types($key);
                if( is_int($valeur) || is_float($valeur) ) {
                    return $valeur;
                }
                else {
                    return 'erreur : Ce champs doit être un chiffre';  
                }  
            }        
        }
        else {
            
            $checkbox = array( 'EL', 'fA110', 'fA111', '111B', 'SRD' );
            if ( $explode_post[2] == 'declaration' && $value == 'oui' ) {
                if( !in_array( POST_data_types($key), $checkbox ) ) {
                    return 'erreur : valeur invalide';  
                }
                else {
                    return POST_data_types($key);   
                }
            }
            //si la case 
            elseif ( $explode_post[2] == 'declaration' && $value == 'non' ) {
                if( !in_array( POST_data_types($key), array( 'oui', 'non') ) ) {
                    return 'erreur : valeur invalide';  
                }
                else {
                    return POST_data_types($key);   
                }    
            }
        }        
    }

?>