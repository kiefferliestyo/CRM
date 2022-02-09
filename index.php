<?php
require_once('models/DB.php');

if (empty($_GET['page'])) {
    $page   =   'home';
}
else {
    $page   =   $_GET['page'];
}

$db =   new DB();

// Require the appropriate controller
require_once('controllers/' . $page . '.php');
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>CRM Dashboard - <?=ucwords(str_replace('-', ' ', $page))?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="description" content="This is an example dashboard created using build-in elements and components.">
        <meta name="msapplication-tap-highlight" content="no">
        <!--
        =========================================================
        * ArchitectUI HTML Theme Dashboard - v1.0.0
        =========================================================
        * Product Page: https://dashboardpack.com
        * Copyright 2019 DashboardPack (https://dashboardpack.com)
        * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
        =========================================================
        * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
        -->
    <link href="./main.css" rel="stylesheet"></head>
    <body>
        <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
            <?php 
            require_once('templates/header.php');
            require_once('templates/ui-options.php'); 
            ?>       
            <div class="app-main">  
                <?php require_once('templates/sidebar.php'); ?>  
                <div class="app-main__outer">
                    <div class="app-main__inner">
                    <?php require_once('views/' . $page . '.php'); ?>
                    <?php // require_once('templates/footer.php'); ?>  
                    </div>
                </div>
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
            </div>
        </div>
    <script type="text/javascript" src="./assets/scripts/main.js"></script></body>
</html>
