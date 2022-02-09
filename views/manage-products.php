<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div>Manage Products</div>
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
                            <th>Product ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($products as $product) {
                    ?>
                        <tr>
                            <td><?=$product['ProductID']?></td>
                            <td><?=$product['Name']?></td>
                            <td>$<?=$product['Price']?></td>
                            <td><?=$product['Description']?></td>
                            <td><?=$product['Status']?></td>
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