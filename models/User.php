<?php
class User{
    private int $id;
    private string $name;
    private string $email;
    private string $password;
    private int $access_level;

    public function setUserAttribute(array $information){
        if($information["id"] !== 0){
            $this->id = $information["id"];
        }
        $this->name = $information["name"];
        $this->email = $information["email"];
        $this->password = $information["password"];
        $this->access_level = $information["access_level"];
    }

    public function getUserAttribute(string $attribute){
        return $this->$attribute;
    }
}