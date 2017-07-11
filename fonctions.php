<?php


    function POST_exist( $post_key ) {
        return isset( $_POST[$post_key] ) ? $_POST[$post_key] : false;
    }

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

    function POST_email_type( $post_key ) {
        if (filter_var($_POST[$post_key], FILTER_VALIDATE_EMAIL)) {
            return $_POST[$post_key];
        }
        else {
            return false;
        }
    }

    function POST_date( $post_key, $format = 'Y-m-d') {

        $d = DateTime::createFromFormat($format, $_POST[$post_key]);
        return $d && $d->format($format) == $_POST[$post_key];

    }

    //fonction testant la partie état civil de la personne remplissant le formulaire.

    function test_etat_civil_vous($key, $value, $explode_post) {
            if( !POST_exist($key) ) return $valeur['erreur'] = 'valeur manquante';

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
                    return !is_int( POST_data_types($key) ) ?  'ce champs doit être un nombre' :  POST_data_types($key);
                }
                else {
                    return !is_string( POST_data_types($key) ) ?  false :  POST_data_types($key);    
                }
            }

            var_dump( $formulaire, $erreur);
        
            
        
    }

    //fonction testant la partie état civil du conjoint du formulaire.

    function test_etat_civil_conjoint($key, $value, $explode_post) {
        
        if( $explode_post[2] == 'email' ){
            return POST_email_type($key);
        }
        elseif ( $explode_post[2] == 'date_naissance' && POST_date($key) ) {
            return $_POST[$key];
        }
        else {
            $valeur = POST_data_types($key);

            $int = array('age', 'code_postal', 'telephone', 'gsm', 'revenus');
            
            if ( in_array( $explode_post[2], $int) ) {
                return !is_int( $valeur) ? $valeur['erreur'] = 'Ce champs doit être un nombre' :  $valeur;
            }
            else {
                !is_string( $valeur ) ? $valeur['erreur'] = 'Ce champs doit être une chaine de caractère' :  $valeur;  
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
                return !is_string( POST_data_types($key) ) ? $valeur['erreur'] = 'Ce champs doit être une chaine de caractère' :  POST_data_types($key);  
            }
        }
        
            
    }

    //fonction testant la partie crédit du formulaire.

    function test_credit($key, $value, $explode_post) {
        
        
        if ( $explode_post[2] == 'date_fin_mensualite' && POST_date($key) ) {
            $formulaire[$explode_post[0]][$explode_post[1]][$explode_post[2]] = $_POST[$key];
        }
        else {
            $int = array( 'montant_mensualite', 'taux', 'capital_restant', 'capital_emprunte' );
            
            if( in_array($explode_post[2], $int ) ){
                if( is_int( POST_data_types($key) ) || is_float( POST_data_types($key) ) ) {
                    $formulaire[$explode_post[0]][$explode_post[1]][$explode_post[2]] = POST_data_types($key);   
                }
                else {
                    $erreurs[$explode_post[0]][$explode_post[1]][$explode_post[2]] = 'Ce champs doit être un chiffre';    
                }
            }
            elseif( $explode_post[2] == 'type_credit') {
                $select = array( 'pret-personnel', 'pret-immobilier', 'pret-travaux' );
                if( !in_array( $explode_post[2], $select ) ) {
                    $erreurs[$explode_post[0]][$explode_post[1]][$explode_post[2]] = 'valeur invalide';  
                }
                elseif ( !is_string( POST_data_types($key)) ) {
                    $erreurs[$explode_post[0]][$explode_post[1]][$explode_post[2]] = 'valeur invalide';
                }
                else {
                    $formulaire[$explode_post[0]][$explode_post[1]][$explode_post[2]] = POST_data_types($key);    
                }        
            }
            else{
                if( is_string( POST_data_types($key) ) ) {
                    $formulaire[$explode_post[0]][$explode_post[1]][$explode_post[2]] = POST_data_types($key);   
                }
                else {
                    $erreurs[$explode_post[0]][$explode_post[1]][$explode_post[2]] = 'Ce champs doit être un chaîne de caractère';    
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
                    return $valeur['erreur'] = 'doit être un chiffre';  
                }          
            }
            else {
                
                $checkbox = array( 'EL', 'fA110', 'fA111', '111B', 'SRD' );
                if ( $explode_post[1] == 'declaration' && $value == 'oui' ) {
                    if( !in_array( $value, $checkbox ) ) {
                        return $valeur['erreur'] = 'valeur invalide';  
                    }
                    else {
                        return $valeur;   
                    }
                }
                elseif ( $explode_post[1] == 'declaration' && $value == 'non' ) {
                    if( !in_array( $value, array( 'oui', 'non') ) ) {
                       return $valeur['erreur'] = 'valeur invalide';  
                    }
                    else {
                        return $valeur;   
                    }    
                }
            }        

            
        }
        else {
            $erreurs[$explode_post[0]]['vous'][$explode_post[1]] = false;
        }

    }
    //fonction testant la partie fiscalité du conjoint du formulaire.

    function test_fiscalite_conjoint($key, $value, $explode_post) {
        if( $explode_post[2] == 'montant_impots') {
            $valeur = POST_data_types($key);
            if( is_int( POST_data_types($key) ) || is_float( POST_data_types($key) ) ) {
                return POST_data_types($key);
            } 
            else {
                return $valeur['erreur'] = 'Ce champs doit être un chiffre';  
            }          
        }
        else {
            
            $checkbox = array( 'EL', 'fA110', 'fA111', '111B', 'SRD' );
            if ( $explode_post[2] == 'declaration' && $value == 'oui' ) {
                if( !in_array( POST_data_types($key), $checkbox ) ) {
                    return $valeur['erreur'] = 'valeur invalide';  
                }
                else {
                    return POST_data_types($key);   
                }
            }
            //si la case 
            elseif ( $explode_post[2] == 'declaration' && $value == 'non' ) {
                if( !in_array( POST_data_types($key), array( 'oui', 'non') ) ) {
                    return $valeur['erreur'] = 'valeur invalide';  
                }
                else {
                    return POST_data_types($key);   
                }    
            }
        }        
    }

?>