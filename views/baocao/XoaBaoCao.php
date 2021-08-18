<?php

include_once APP_PATH . '/classes/BaoCao.php';

$bc = new BaoCao();

if (!empty($_GET['deletereport'])) {
    $affected_rows = $bc->delete($_GET['deletereport']);
    header('location: ?report');
}
