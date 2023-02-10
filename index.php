<?php
include "bootstrap/init.php";
print_r($_ENV);
echo site_url('test') . '<hr>';
echo $_SERVER['REQUEST_URI'];
