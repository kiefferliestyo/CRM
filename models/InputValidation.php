<?php
// Class for validating input from $_POST requests
class InputValidation {
    private $errors;

    // Initializes the errors array and checks through all of the data to make sure they are not empty
    function __construct() {
        $this->errors =   array();
    }
    // Checks for required data in $_POST
    public function checkData($required) {
        foreach ($required as $value) {
            if (empty($_POST[$value])) {
                $this->errors[$value] =   'Required field is empty.';
            }
        }
    }
    // Checks if value is an integer
    public function checkInteger($key, $value) {
        if (filter_var($value, FILTER_VALIDATE_INT) === false) {
            $this->errors[$key] =   'Invalid Integer.';
        }
        return trim(htmlspecialchars($value));
    }
    // Checks if value is a string
    public function checkString($key, $value) {
        if (!is_string($value)) {
            $this->errors[$key] =   'Invalid String.';
        }
        return trim(htmlspecialchars($value));
    }
    // Checks if value is a boolean
    public function checkBoolean($key, $value) {
        if (filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) === NULL) {
            $this->errors[$key] =   'Invalid Boolean';
        }
        return trim(htmlspecialchars($value));
    }
    // Checks if value is an email
    public function checkEmail($key, $value) {
        if (filter_var($value, FILTER_VALIDATE_EMAIL) === false) {
            $this->errors[$key] =   'Invalid Email';
        }
        return trim(htmlspecialchars($value));
    }
    // Gets the array of errors
    public function getErrors() {
        return $this->errors;
    }
}
?>