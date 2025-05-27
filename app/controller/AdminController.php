<?php

class AdminController {

    public function __construct()
    {
        
    }

    public function dashboard(){
        
        AuthMiddleware::redirect_if_not_authenticated();

        $data = [
            'title' => 'Dashboard',
            'message' => 'Welcome to dashboard',
        ];

        render('admin/dashboard', $data, 'layout/admin_layout');
    }
}


?>