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

    public function generateDefaultPassword(){
        $password = null;
        $lowercase = 'abcdefghijklmnopqrstuvxyz';
        $uppercase = 'ABCDEFGHIJKLLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';
        $special_chars = '!@#$%&*()./|';

        $arr_0 = str_split($lowercase);
        $arr_1 = str_split($uppercase);
        $arr_2 = str_split($numbers);
        $arr_3 = str_split($special_chars);

        for($i = 0; $i <= 1; $i++){
            $random_number_0 = rand(0, count($arr_0) - 1);
            $random_number_1 = rand(0, count($arr_1) - 1);
            $password .= $arr_0[$random_number_0] . $arr_1[$random_number_1];
        }
        for($i = 0; $i <= 1; $i++){
            $random_number_3 = rand(0, count($arr_3) - 1);
            $password .= $arr_3[$random_number_3];
        }
        for($i = 0; $i <= 1; $i++){
            $random_number_2 = rand(0, count($arr_2) - 1);
            $password .= $arr_2[$random_number_2];
        }

        return $password;
    }
}