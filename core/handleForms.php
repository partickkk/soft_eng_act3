<?php

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['register'])) {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $position = trim($_POST['position']);
    $hire_date = trim($_POST['hire_date']);
    $salary = trim($_POST['salary']);
    $phone_number = trim($_POST['phone_number']);
    $email = trim($_POST['email']);

    if (!empty($first_name) && !empty($last_name) && !empty($position) && !empty($hire_date) && !empty($salary) && !empty($phone_number) && !empty($email)) {
        
        $query = insertIntoEmployeesAccounts($pdo, null, $first_name, $last_name, $position, $hire_date, $salary, $phone_number, $email);

        if ($query) {
            header("Location: ../index.php");
            exit();
        } else {
            echo "Insertion failed";
        }
    } else {
        echo "Make sure that no fields are empty";
    }
}

if (isset($_POST['editUserBtn'])) {
    $employee_id = $_GET['employee_id'];
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $position = trim($_POST['position']);
    $hire_date = trim($_POST['hire_date']);
    $salary = trim($_POST['salary']);
    $phone_number = trim($_POST['phone_number']);
    $email = trim($_POST['email']);

    if (!empty($employee_id) && !empty($first_name) && !empty($last_name) && !empty($position) && !empty($hire_date) && !empty($salary) && !empty($phone_number) && !empty($email)) {

        $query = updateAEmployees($pdo, $employee_id, $first_name, $last_name, $position, $hire_date, $salary, $phone_number, $email);

        if ($query) {
            header("Location: ../index.php");
        }
        else {
            echo "Update failed";
        }
    }
    else {
        echo "Make sure that no fields are empty";
    }
}

if (isset($_POST['deleteUserBtn'])) {

    $employee_id = $_GET['employee_id'];
    if (!empty($employee_id)) {
        $query = deleteAEmployees ($pdo, $employee_id);

        if ($query) {
            header("Location: ../index.php");
            exit();
        }
        else {
            echo "Deletion failed";
        }
    } else {
        echo "Invalid user ID";
    }
}

?>