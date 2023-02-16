<?php
include "bootstrap/init.php";
nice_dump($_ENV);
nice_dump(site_url('test'));
nice_dump($_SERVER['REQUEST_URI']);
nice_dump(current_route());
nice_dd($request->params(), "I'm dead :)");
echo "test";
