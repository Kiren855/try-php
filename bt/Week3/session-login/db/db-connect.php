<?php

function connectDB()
{
    $envFile = __DIR__ . "/../config/.env";

    if (!file_exists($envFile)) {
        die("Error: The .env file is not found in directory: " . $envFile);
    }

    $env = file_get_contents($envFile);
    $lines = explode("\n", $env);

    foreach ($lines as $line) {
        preg_match("/([^#]+)\=(.*)/", $line, $matches);
        if (isset($matches[2])) {
            putenv(trim($line));
        }
    }

    $host = getenv('HOST');
    $user = getenv('USER');
    $password = '12345678'; //getenv('PASSWORD');
    $db = getenv('DB');

    $con = mysqli_connect($host, $user, $password, $db);
    if ($con) {
        echo "OK";
    } else {
        echo "Not Ok";
    }
    return $con;
}

connectDB();
