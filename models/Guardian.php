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
    private float $payment;

    public function setGuardinAttribute(array $information){
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
        $this->payment = $information['payment'];
    }
}