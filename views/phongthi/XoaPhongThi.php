<?php

include_once APP_PATH . '/classes/PhongThi.php';

$pt = new PhongThi();

if (!empty($_GET['deleteroom'])) {
    $affected_rows = $pt->delete($_GET['deleteroom']);
    header('location: ?room');
}
