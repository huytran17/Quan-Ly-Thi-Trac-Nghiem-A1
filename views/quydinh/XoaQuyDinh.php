<?php

include_once APP_PATH . '/classes/QuyDinh.php';

$qd = new QuyDinh();

if (!empty($_GET['deleterule'])) {
    $affected_rows = $qd->delete($_GET['deleterule']);
    header('location: ?rule');
}
