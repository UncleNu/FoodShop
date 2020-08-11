<?php
 
 
$config['base_url'] = 'http://localhost/Foods/foodshop3/';
$config['base_path'] = 'http://localhost/Foods/foodshop3/';
$config['default_controller'] = 'main';
$config['error_controller'] = 'notfound';

$config['token_session'] = '123456';
$config['token_pass'] = '123456';
$config['token_encode'] = true;

$config['show_error'] = false;
$config['show_error_level'] = '1';
// 1 normal // 2 advance

$config['db_host'] = 'kis-db-02.kraois.com';
$config['db_name'] = 'db_canteen';
$config['db_username'] = 'phpmyadmin';
$config['db_password'] = 'Kraosoft@min@1';
$config['db_prefix'] = '';
// DB1
$config['db_host1'] = 'kis-db-02.kraois.com';
$config['db_name1'] = 'db_canteen';
$config['db_username1'] = 'phpmyadmin';
$config['db_password1'] = 'Kraosoft@min@1';

define("DB_HOST", $config['db_host']);
define("DB_NAME", $config['db_name']);
define("DB_USERNAME", $config['db_username']);
define("DB_PASSWORD", $config['db_password']);
define("DB_PREFIX", $config['db_prefix']);

define("ENCRYPTION_KEY", "!@#$%^&*");

//สำหรับเข้ารหัสข้อความที่ต้องการ จาก Function mainclass->encrypt(); และ ถอด mainclass->decrypt()
define('SEND_EMAIL_FROM_NAME', '');
define('SEND_EMAIL_HOST_SMTP', '');
define('SEND_EMAIL_PROTOCOL', '');
define('SEND_EMAIL_PORT', 25);

define('SEND_EMAIL_USERNAME', '');
define('SEND_EMAIL_PASSWORD', '');
define('SEND_EMAIL_CC', '');

define('SEND_EMAIL_FROM', '');
define('SEND_EMAIL_REPLY', '');

?>