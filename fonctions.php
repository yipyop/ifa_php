<?php

    function POST_exist( $post_key ) {
        return isset( $_POST[$post_key] ) ? $_POST[$post_key] : false;
    }

    function POST_data_types( $post_key ) {
        if( is_numeric( $_POST[$post_key] ) ) {
            return (int) $_POST[$post_key];
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

?>