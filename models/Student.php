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
    private string $period;

    private int $rm;

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
        $this->period = $information['period'];
        $this->rm = $information['rm'];
    }

    public function getStudentAttribute(string $attribute){
        return $this->$attribute;
    }

    public function generateStudentEmail(string $name){
        $new_array = [];
        $chosen_names = [];
        $email = null;
        $random_number = random_int(100, 1000);

        $user_complet_name_array = explode(" ", $name);
        foreach($user_complet_name_array as $element){
            if(strlen($element) <= 2){
                unset($element);
            } else {
                $new_array[] = strtolower($element);
            }
        }
        
        for($i = 0; $i < 2; $i++){
            $random_element = rand(0, 2);
            $chosen_names[] = $new_array[$random_element];
        }

        $email = $chosen_names[0] . "." . $chosen_names[1] . $random_number . "@school.com";
        return $email;
    }
}