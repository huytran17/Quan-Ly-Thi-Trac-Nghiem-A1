<?php

include_once APP_PATH . '/classes/CaThi.php';

$ct = new CaThi();

if (!empty($_GET['deleteshift'])) {
    $affected_rows = $ct->delete($_GET['deleteshift']);
    header('location: ?shift');
}
