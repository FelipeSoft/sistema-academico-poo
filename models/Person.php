<?php
class Person{
    private int $id;
    private string $name;
    private string $email;
    private string $password;

    private string $born_date;
    private string $cpf;
    private string $rg;
    private int $access_level;

    public function setPersonAttribute(array $information){
        if($information["id"] !== 0){
            $this->id = $information["id"];
        }
        $this->name = $information["name"];
        $this->email = $information["email"];
        $this->password = $information["password"];
        $this->born_date = $information["born_date"];
        $this->cpf = $information["cpf"];
        $this->rg = $information["rg"];
        $this->access_level = $information["access_level"];
    }

    public function getPersonAttribute(string $attribute){
        return $this->$attribute;
    }
}