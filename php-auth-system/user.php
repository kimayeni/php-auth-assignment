<?php
require 'config.php';

class User {
    public $id;
    public $username;
    public $email;

    public function __construct($data) {
        $this->id = $data['id'];
        $this->username = $data['username'];
        $this->email = $data['email'];
    }

    // Find by email
    public static function findByEmail($email) {
        global $conn;

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $data = $stmt->fetch();

        return $data ? new User($data) : null;
    }

    // Find by ID
    public static function findById($id) {
        global $conn;

        $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch();

        return $data ? new User($data) : null;
    }
}