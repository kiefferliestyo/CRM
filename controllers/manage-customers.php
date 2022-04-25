<?php
// Set default number of rows to display
$rows    =   !empty($_GET['Rows']) ? $_GET['Rows'] : 50;
// Set search and filter type values if the GET variables are set
if (!empty($_GET['SearchValue']) && !empty($_GET['SearchFilter'])) {
    $searchValue    =   trim($_GET['SearchValue']);
    $searchFilter   =   $_GET['SearchFilter'];
    // Set the default input type based on the search filter
    if ($searchFilter == 'FirstName' || $searchFilter == 'LastName' || $searchFilter == 'Email') {
        $inputType  =   'text';
    }
    else if ($searchFilter == 'CustomerID') {
        $inputType  =   'number';
    }
    else if ($searchFilter == 'DOB') {
        $inputType  =   'date';
    }
    else {
        $inputType  =   'select';
    }
    $customers  =   $db->getCustomers($rows, $searchValue, $searchFilter);
}
else {
    $customers  =   $db->getCustomers($rows);
}
?>