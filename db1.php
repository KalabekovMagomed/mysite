<?php
require "libs/rb.php";
R::setup( 'mysql:host=localhost;dbname=lesson',
        'root', '' );
$con = mysqli_connect('localhost', 'root', '', 'lesson');
?>