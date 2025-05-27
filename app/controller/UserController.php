<?php


class UserController
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    //REGISTER 
    public function register_form()
    {

        render('user/register');
    }

    public function register()
    {
        try {
            $this->user->username = $_POST['username'];
            $this->user->email = $_POST['email'];
            $this->user->password = $_POST['password'];

            if ($this->user->store()) {
                redirect('/');
                exit;
            } else {
                echo "Registration failed.";
            }
        } catch (Exception $e) {
            echo "Error happened during registration: " . $e->getMessage();
        }
    }
    //

    //LOGIN

    public function login_form()
    {
        render('user/login');
    }

    public function login()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->user->email = $_POST['email'];
        $this->user->password = $_POST['password'];

        $user_data = $this->user->login();

        if ($user_data) {
            $_SESSION['username'] = $user_data['username'];
            $_SESSION['id'] = $user_data['id'];
            redirect('/dashboard');
        } else {
            echo "Not logged in.";
        }
    }

    public function logout()
    {
        $_SESSION = [];

        session_destroy();

        redirect('/login');
    }
}
