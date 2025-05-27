<?php

class User
{

    private $table = 'users';
    private $conn;
    public $id;
    public $username;
    public $email;
    public $password;


    public function __construct()
    {
        $this->conn = Database::get_instance()->get_connection();
    }

    public function store()
    {
        $query = "INSERT INTO " . $this->table . " (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $this->conn->prepare($query);

        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);

        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function login()
    {
        $query = "SELECT * FROM " . $this->table . " WHERE email = :email";
        $stmt = $this->conn->prepare($query);

        $this->email = sanitize($this->email);

        $stmt->bindParam(':email', $this->email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $fetch_user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($fetch_user && password_verify($this->password, $fetch_user['password'])) {
                $this->id = $fetch_user['id'];
                $this->username = $fetch_user['username'];
                return [
                    'id' => $this->id,
                    'username' => $this->username
                ];
            }
        }

        return false;
    }
}
