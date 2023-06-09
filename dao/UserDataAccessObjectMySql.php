<?php
require_once("C:/xampp/htdocs/sistema-academico-poo/models/User.php");
class UserDataAccessObjectMySql{
    private $pdo;
    public function __construct($driver){
        $this->pdo = $driver;
    }

    public function create(User $user){
        try{
            $sql = $this->pdo->prepare("INSERT INTO users (name, email, password, access_level) 
            VALUES (:name, :email, :password, :access_level)");
            $sql->bindValue(":name", $user->getUserAttribute("name"));
            $sql->bindValue(":email", $user->getUserAttribute("email"));
            $sql->bindValue(":password", password_hash($user->getUserAttribute("password"), PASSWORD_DEFAULT));
            $sql->bindValue(":access_level", $user->getUserAttribute("access_level"));
            $sql->execute();
        } catch(PDOException $error) {
            echo $error->getMessage();
            exit;
        }
    }

    public function getUserByAuthorization(string $email, int $access_level){
        try{
            $sql = $this->pdo->prepare("SELECT * FROM users WHERE access_level = :access_level AND email = :email");
            $sql->bindValue(":access_level", $access_level);
            $sql->bindValue(":email", $email);
            $sql->execute();
    
            if($sql->rowCount() > 0){
                $data = $sql->fetch(PDO::FETCH_ASSOC);
                $user = new user();
                $user->setUserAttribute($data);
    
                return $user;
            }
            return null;
        } catch(PDOException $error){
            echo "Error: " . $error->getMessage();
            exit;
        }
    }

    public function all(){
        $users = null;
        try{
            $sql = $this->pdo->prepare("SELECT * FROM users");
            $sql->execute();

            if($sql->rowCount() > 0){
                foreach($sql as $data){
                    $user = new User();
                    $user->setUserAttribute([
                        "id" => $data["id"],
                        "name" => $data["name"],
                        "email" => $data["email"],
                        "password" => $data["password"],
                        "access_level" => $data["access_level"],
                    ]);
    
                    $users[] = $user;
                }
                return $users;
            } else {
                return null;
            }

        } catch(PDOException $error){
            echo $error->getMessage();
            die;
        }
    }

    public function delete(int $id){
        $sql = $this->pdo->prepare("DELETE FROM users WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function getUserByName($name){
        
    }

    public function checkIfEmailExists(string $email){
        $sql = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $sql->bindValue(":email", $email);
        $sql->execute();
        return $sql->rowCount() > 0 ? true : false;
    }
}