<?php

include_once APP_PATH . '/classes/BienBan.php';

$bb = new BienBan();

if (!empty($_GET['deleteprot'])) {
    $affected_rows = $bb->delete($_GET['deleteprot']);
    header('location: ?prot');
}
