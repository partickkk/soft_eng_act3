<?php

require_once 'dbConfig.php' ;

function insertIntoEmployeesAccounts($pdo,$employee_id, $first_name,$last_name,$position,$hire_date, $salary, $phone_number, $email) {

    $sql = "INSERT INTO Employees (employee_id, first_name, last_name,position,hire_date, salary, phone_number, email) VALUES (?,?,?,?,?,?,?,?)";

    $stmt = $pdo->prepare($sql);

    $executeQuery = $stmt->execute([$employee_id, $first_name,$last_name,$position,$hire_date, $salary, $phone_number, $email]) ;

    if ($executeQuery) {
        return true;
    }
}

function seeAllEmployees($pdo){
    $sql = "SELECT * FROM Employees";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();
    
    if($executeQuery) {
        return $stmt->fetchAll();
    }
}

function getEmployeesById($pdo, $employee_id){
    $sql = "SELECT * FROM Employees WHERE employee_id = ?";
    $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$employee_id])) {
            return $stmt->fetch();
    }
}

function updateAEmployees($pdo, $employee_id, $first_name,$last_name,$position,$hire_date, $salary, $phone_number, $email){
    
    $sql = "UPDATE Employees
        SET first_name = ?,
            last_name = ?,
            position = ?,
            hire_date = ?,
            salary = ?,
            phone_number = ?,
            email = ?
        WHERE employee_id = ?";
    $stmt = $pdo->prepare($sql);
    
    return $stmt->execute([$first_name,$last_name,$position,$hire_date, $salary, $phone_number, $email, $employee_id]);

    if($executeQuery){
        return true;
    }
}

function deleteAEmployees($pdo, $employee_id) {
    $stmt = $pdo->prepare("DELETE FROM Employees WHERE employee_id = ?");

    $executeQuery = $stmt->execute([$employee_id]);

    if ($executeQuery) {
        return true;
    }
}

?>