<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
    // Require the InputValidation class
    require_once('./models/InputValidation.php');
    // Instantiate a new InputValidation class
    $validate   =   new InputValidation();
    // Create array containing list of required fields
    $required   =   array('FirstName', 'LastName', 'Email', 'DOB');
    // Checks whether fields in the required array are in $_POST
    $validate->checkData($required);
    // Get the errors from the InputValidation class
    $errors     =   $validate->getErrors();
    // If there are no empty field errors, validate each field based on the expected input type
    if (empty($errors)) {
        $firstName      =   $validate->checkString('FirstName', $_POST['FirstName']);
        $lastName       =   $validate->checkString('LastName', $_POST['LastName']);
        $email          =   $validate->checkEmail('Email', $_POST['Email']);
        $dob            =   $validate->checkString('DOB', $_POST['DOB']);
        $phoneNumber    =   $validate->checkInteger('PhoneNumber', str_replace("-", "", $_POST['PhoneNumber']));
        // Get the errors again
        $errors =   $validate->getErrors();
        // If it is still empty, insert all the data into the DB and then redirect to the 'Manage Customers' page
        if (empty($errors)) {
            // Combine all data into an array
            $data   =   array(
                'FirstName'     =>  $firstName,
                'LastName'      =>  $lastName,
                'Email'         =>  $email,
                'DOB'           =>  $dob,
                'PhoneNumber'   =>  $phoneNumber
            );
            // Insert data to the DB
            $success    =   $db->addCustomer($data);
            // Check if the insert was successful or not
            if ($success) {
                // Redirect to 'Manage Customers' page
                header('Location: index.php?page=manage-customers');
            }
            else {
                $insertError    =    "The customer was not added successfully.";
            }
        }
    }
    else {
        $firstName      =   $_POST['FirstName'];
        $lastName       =   $_POST['LastName'];
        $email          =   $_POST['Email'];
        $dob            =   $_POST['DOB'];
        $phoneNumber    =   $_POST['PhoneNumber'];
    }
}
?>