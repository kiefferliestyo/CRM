<?php
// Function to debug variables easily
function debug($variable) {
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    exit();
}
// Generates the pagination html
function generatePagination($rowCount, $rows, $pagination, $searchString = '') {
    $paginations    =   intval(ceil($rowCount / $rows));
    $html           =   '<nav>
                            <ul class="pagination">';
    $html           .=          '<li class="page-item">
                                    <a href="index.php?page=manage-customers&pagination=1' . $searchString . '&rows=' . $rows . '" class="page-link" aria-label="Previous">
                                        <span aria-hidden="true">«</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>';
    if ($pagination < 3) {
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $paginations) {
                $html   .=          '<li class="page-item' . ($pagination == $i ? ' active' : '') . '">
                                        <a href="index.php?page=manage-customers&pagination=' . $i . $searchString . '&rows=' . $rows . '" class="page-link">' . $i . '</a>
                                    </li>';
            }
        }
    }
    else if ($pagination >= 3 && $pagination < $paginations - 1) {
        for ($i = $pagination - 2; $i <= $pagination + 2; $i++) {
            $html   .=          '<li class="page-item' . ($pagination == $i ? ' active' : '') . '">
                                    <a href="index.php?page=manage-customers&pagination=' . $i . $searchString . '&rows=' . $rows . '" class="page-link">' . $i . '</a>
                                </li>';
        }
    }
    else {
        for ($i = $paginations - 4; $i <= $paginations; $i++) { 
            $html   .=          '<li class="page-item' . ($pagination == $i ? ' active' : '') . '">
                                    <a href="index.php?page=manage-customers&pagination=' . $i . $searchString . '&rows=' . $rows . '" class="page-link">' . $i . '</a>
                                </li>';
        }
    }
    $html           .=          '<li class="page-item">
                                    <a href="index.php?page=manage-customers&pagination=' . $paginations . $searchString . '&rows=' . $rows . '" class="page-link" aria-label="Next">
                                        <span aria-hidden="true">»</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>';
    $html           .=      '</ul>
                        </nav>';
    echo $html;
}
?>