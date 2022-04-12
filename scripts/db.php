<?php

function get_database_connection() 
{
    $dsn = "mysql:dbname=haightk1_hbdb;host=localhost";
    $username = "haightk1_administrator";
    $password = "NYE99xyzCPA";

    try {
        $pdo = new PDO($dsn, $username, $password);
    } 
    catch (PDOException $exception) {
        $errorMessage = $exception->getMessage();
        echo $errorMessage;
        exit(1);
    }

    return $pdo;
}

function isAmountInputValid($input) 
{
    if (!is_numeric($input)) {
        return false;
    }
    
    $amount = floatval($input);
    $amountIsPositive = (amount > 0);

    // amount should have a maximum of 2 decimal places
    $amountHasValidDecimals = (round($amount, 2) === $amount);
    
    return $amountIsPositive and $amountHasValidDecimals;
}
