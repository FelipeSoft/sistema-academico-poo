<?php
class Teacher{
    private int $id;
    private string $name;
    private string $email;
    private string $cpf;
    private string $rg;
    private string $cellphone;
    private string $tellphone = 0;
    private float $wage;
    private int $education;
    private string $born_date;
    
    public function setTeacherAttribute(array $info){
        if($info["id"] !== 0){
            $this->id = $info["id"];
        } 
        $this->name = $info["name"];
        $this->email = $info["email"];
        $this->cpf = $info["cpf"];
        $this->rg = $info["rg"];
        $this->cellphone = $info["cellphone"];
        $this->tellphone = $info["tellphone"];
        $this->wage = $info["wage"];
        $this->education = $info["education"];
        $this->born_date = $info["born_date"];
    }
    public function getTeacherAttribute(string $name){
        return $this->$name;
    }
}