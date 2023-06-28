<?php
require_once 'app/Models/User.php';
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require  'Helper.php';
require_once 'vendor/autoload.php';
require_once 'routes/web.php';


