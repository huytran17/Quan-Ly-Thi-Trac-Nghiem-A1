<?php

include_once APP_PATH . '/classes/ThiSinh.php';

$ts = new ThiSinh();

if (!empty($_GET['deleteprofile'])) {
    $affected_rows = $ts->delete($_GET['deleteprofile']);
    header('location: ?profile');
}
