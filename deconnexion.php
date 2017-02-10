<?php

session_start();//sans cette session le html ne marche pas
$_SESSION=array();
session_destroy();
header('location:index.php');


