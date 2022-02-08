<?php
$customers  =   $db->getCustomers();
?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div>Manage Customers</div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <table class="mb-0 table table-striped">
                    <thead>
                        <tr>
                            <th>Customer ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Date of Birth</th>
                            <th>Email Address</th>
                            <th>Phone Number</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($customers as $customer) {
                    ?>
                        <tr>
                            <td><?=$customer['CustomerID']?></td>
                            <td><?=$customer['FirstName']?></td>
                            <td><?=$customer['LastName']?></td>
                            <td><?=$customer['DOB']?></td>
                            <td><?=$customer['Email']?></td>
                            <td><?=$customer['PhoneNumber']?></td>
                            <td><?=$customer['Status']?></td>
                            <td><button class="btn btn-primary">Edit</button></td>
                            <td><button class="btn btn-danger">Delete</button></td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>