<?php 
session_start();
define('_BDZ',1);
define('BDZ_BASE',__DIR__);
require_once 'path.php';
session_destroy();
header('Location:'.BDZ_URL_ROOT);
exit;
 ?>