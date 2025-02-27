<?php

class Validation
{
    private $errors;

    public function construct()
    {
        $this->errors = [];
    }

    public function validate($rules)
    {
        foreach ($rules as $key => $rule) {
            $value = $_POST[$key];
            foreach ($rule as $r) {
                if ($r == "required") {
                    if (empty($value)) {
                        $this->errors[$key] = "The $key field is required";
                    }
                }
                if ($r == "string") {
                    if (!is_string($value)) {
                        $this->errors[$key] = "The $key field must be a string";
                    }
                }
                if ($r == "email") {
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $this->errors[$key] = "The $key field must be a valid email address";
                    }
                }
                if ($r == "numeric") {
                    if (!is_numeric($value)) {
                        $this->errors[$key] = "The $key field must be a number";
                    }
                }
                if (strpos($r, "min:") !== false) {
                    $min = explode(":", $r)[1];
                    if (strlen($value) < $min) {
                        $this->errors[$key] = "The $key field must be at least $min characters long";
                    }
                }
            }
        }
    }
    public function getErrors()
    {
        return $this->errors;
    }

}