<?php

#Define MEDIA_URL as constant
define("MEDIA_URL", $_SERVER['DOCUMENT_ROOT'] . '/media/');
define("MODEL_URL", $_SERVER['DOCUMENT_ROOT'] . '/models/');
define("SCRIPT_URL", $_SERVER['DOCUMENT_ROOT'] . '/scripts/');

#Include Models
include_once SCRIPT_URL . 'database.php';
include_once MODEL_URL . 'Account.php';
include_once MODEL_URL . 'Staff.php';
include_once MODEL_URL . 'User.php';

