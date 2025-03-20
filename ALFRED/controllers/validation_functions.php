<?php

function validateCapitalization($value) {
    if (!preg_match('/^[A-Z][a-zA-Z\s]*$/', $value)) {
        return "First letter must be capitalized, and only letters are allowed!";
    }
    return "";
}

function validateMiddleInitial($value) {
    if (!empty($value) && !preg_match('/^[A-Z]$/', $value)) {
        return "Please enter only one uppercase letter.";
    }
    return "";
}

function validateAge($dob) {
    $dobDate = new DateTime($dob);
    $today = new DateTime();
    $age = $today->diff($dobDate)->y;
    
    if ($age < 18) {
        return "You must be 18 years or older.";
    }
    return "";
}

function validateTIN($tin) {
    if (!preg_match('/^\d{9}$/', $tin)) {
        return "TIN must contain exactly 9 numbers only.";
    }
    return "";
}

function validateNumberInput($value) {
    if (!preg_match('/^[0-9]*$/', $value)) {
        return "Please enter numbers only.";
    }
    return "";
}

function validateEmail($email) {
    if (empty($email)) {
        return "Email address is required.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Please enter a valid email address (e.g., user@example.com).";
    }
    return "";
}

?>