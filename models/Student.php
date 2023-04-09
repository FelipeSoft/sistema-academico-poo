<?php
class Student{
    private int $id;
    private string $name;
    private string $email;
    private string $born_date;
    private string $rg;
    private string $cpf;
    private string $grade;
    private string $schooling;
    private int $guardian_id;

    public function setStudentAttribute(array $information){
        if($information["id"] !== 0){
            $this->id = $information["id"];
        }

        $this->name = $information['name'];
        $this->email = $information['email'];
        $this->born_date = $information['born_date'];
        $this->rg = $information['rg'];
        $this->cpf = $information['cpf'];
        $this->grade = $information['grade'];
        $this->schooling = $information['schooling'];
        $this->guardian_id = $information['guardian_id'];
    }

    public function getStudentAttribute(string $attribute){
        return $this->$attribute;
    }
}