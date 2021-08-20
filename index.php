<?php
define('APP_PATH', __DIR__);

include_once('./config/app.php');
include_once(APP_PATH . '/classes/Model.php');

//include_once(APP_PATH . '/database/Migration.php');
// $migration = new Migration();
// $migration->refresh();

include_once(APP_PATH . '/views/layout/header.php');
include_once(APP_PATH . '/views/layout/sidebar.php');

include_once './routes.php';

include_once(APP_PATH . '/views/layout/footer.php');
