<?php


session_start();

session_destroy();

session_reset();
$_SESSION = [];

header("location: http://localhost/impproject/gshop/");
