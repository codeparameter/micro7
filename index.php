<?php
include "bootstrap/init.php";
print_r($_ENV);
echo '<hr>' . site_url('test') . '<hr>';
echo $_SERVER['REQUEST_URI'] . '<hr>';
echo current_route() . '<hr>';
