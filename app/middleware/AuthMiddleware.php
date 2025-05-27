<?php

class AuthMiddleware {

    public static function is_authenticated() {

        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }

        return isset($_SESSION['id']) && !empty($_SESSION['id']);
    }

    public static function redirect_if_not_authenticated($redirect_url = '/login') {

        if (!self::is_authenticated()) {
            redirect('login');
            exit();
        }
    }

}

?>