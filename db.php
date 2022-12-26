<?php
require('rb.php');
R::setup( 'mysql:host=localhost;dbname=auth',
        'root', 'root' ); //for both mysql or mariaDB
session_start();
?>