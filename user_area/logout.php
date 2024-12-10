<?php


session_start();
session_unset();
session_destroy();
echo "<script>window.open('../index.php,'_self')</script>

<p class='text-center'><a href='../index.php' class='text-dark'>Explore Products</a></p>";
?>