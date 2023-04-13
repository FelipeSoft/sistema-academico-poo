<?php
class Guardian{
    private int $id;
    private string $name;
    private string $email;
    private string $cellphone;
    private string $tellphone = "";
    private string $born_date;
    private string $rg;
    private string $cpf;

    private int $frequency;
    private float $payment;
    private int $student_id;


    public function setGuardianAttribute(array $information){
        if($information["id"] !== 0){
            $this->id = $information["id"];
        } elseif($information["tellphone"] !== 0){
            $this->tellphone = $information["tellphone"];
        }

        $this->name = $information['name'];
        $this->email = $information['email'];
        $this->cellphone = $information['cellphone'];
        $this->born_date = $information['born_date'];
        $this->rg = $information['rg'];
        $this->cpf = $information['cpf'];
        $this->frequency = $information['frequency'];
        $this->payment = $information['payment'];
        $this->student_id = $information['student_id'];
    }

    public function getGuardianAttribute(string $attribute){
        return $this->$attribute;
    }
}