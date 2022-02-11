<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
    // Require the InputValidation class
    require_once('./models/InputValidation.php');
    // Instantiate a new InputValidation class
    $validate   =   new InputValidation();
    // Create array containing list of required fields
    $required   =   array('ProductName', 'Price');
    // Checks whether fields in the required array are in $_POST
    $validate->checkData($required);
    // Get the errors from the InputValidation class
    $errors     =   $validate->getErrors();
    // If there are no empty field errors, validate each field based on the expected input type
    if (empty($errors)) {
        $productName    =   $validate->checkString('ProductName', $_POST['ProductName']);
        $price          =   $validate->checkFloat('Price', $_POST['Price']);
        $description    =   $validate->checkString('Description', $_POST['Description']);
        // Get the errors again
        $errors =   $validate->getErrors();
        // If it is still empty, insert all the data into the DB and then redirect to the 'Manage Customers' page
        if (empty($errors)) {
            // Combine all data into an array
            $data   =   array(
                'ProductName'   =>  $productName,
                'Price'         =>  $price,
                'Description'   =>  $description
            );
            // Insert data to the DB
            $success =   $db->addProduct($data);
            // Check if the insert was successful or not
            if ($success) {
                // Redirect to 'Manage Customers' page
                header('Location: index.php?page=manage-products');
            }
            else {
                $insertError    =   "The product was not added succesfully.";
            }
        }
    }
    else {
        $productName    =   $_POST['ProductName'];
        $price          =   $_POST['Price'];
        $description    =   $_POST['Description'];
    }
}
?>