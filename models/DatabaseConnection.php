<?php
class DatabaseConnection{
    private string $db_name;
    private string $db_host;
    private string $db_user;
    private string $db_password;

    public function __construct(string $name, string $host, string $user, string $password){
        $this->db_name = $name;
        $this->db_host = $host;
        $this->db_user = $user;
        $this->db_password = $password;
    }
    public function connect(){
        $pdo = null;
        try{
            $pdo = new PDO("mysql:dbname=" . $this->db_name . ";host=" . $this->db_host, $this->db_user, $this->db_password);
            return $pdo;
        } catch (PDOException $error) {
            $error->getMessage();
        }
    }
}