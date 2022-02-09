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
                            <th>Invoice ID</th>
                            <th>Customer ID</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($invoices as $invoice) {
                    ?>
                        <tr>
                            <td><?=$invoice['InvoiceID']?></td>
                            <td><?=$invoice['CustomerID']?></td>
                            <td>$<?=$invoice['TotalPrice']?></td>
                            <td><?=$invoice['Status']?></td>
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