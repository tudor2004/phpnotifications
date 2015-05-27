<?php
define('PUBLIC_PATH', __DIR__ . '/public');

require 'vendor/autoload.php';


use Plenty\PlentyNotify\NotifyController;

NotifyController::getInstance()->notify($_REQUEST['title'] ?: 'This is the title', $_REQUEST['message'] ?: 'This is the message',  $_REQUEST['type'] ?: 'warning');