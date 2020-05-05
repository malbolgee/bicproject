<?php

    require "constants.php";

    $conn = new mysqli(HOST, USUARIO, SENHA, DB);

    if (!$conn)
        die("Connection failed: " . $conn->connect_error());

    $conn->set_charset('utf8mb4');