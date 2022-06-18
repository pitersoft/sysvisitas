<?php 


error_reporting(E_ERROR | E_WARNING | E_PARSE);
date_default_timezone_set('America/Peru');
setlocale(LC_TIME, "es_ES");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '*274053*');
define('DB_NAME', 'basesistema');
define('ENLACE_SERVIDOR', 'C://laragon/www/sysvisitas/');
define('ENLACE_WEB', 'http://127.0.0.1/sysvisitas/');
define('BOOTSTRAP', 'http://127.0.0.1/sysvisitas/bootstrap/');
define('PROY_TITULO', 'SISTEMA INPE PICSI');


$dbh = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=UTF8', DB_USERNAME, DB_PASSWORD, array(
    PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
));




$hostbd = "localhost";
$usuariobd = "root";
$clavebd = "*274053*";
$bdbd = "basesistema";

$conexion = mysqli_connect($hostbd,$usuariobd,$clavebd,$bdbd);

?>