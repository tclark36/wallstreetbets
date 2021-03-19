<?php
    $host = 'cpscwallstreetbets.mysql.database.azure.com';
    $username = 'tclark36@cpscwallstreetbets';
    $password = 'Cpsc2021';
    $db_name = 'cpsc';

    $conn = mysqli_connect($host, $username, $password, $db_name);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

?>