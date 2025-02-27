<?php

require_once "Validation.php";

$validator = new Validation();
$validator->validate(
    [
        "name" => ["required", "string"],
        "email" => ["required", "email"],
        "phone" => ["required", "numeric"],
        "password" => ["required", "string", "min:3"],
    ]
);
if(empty($validator->getErrors())){
    echo "Form submitted successfully";
}else{
    echo "<pre>";
    var_dump($validator->getErrors());
    echo "</pre>";
}