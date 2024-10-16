<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<?php $getEmployeesById = getEmployeesById($pdo, $_GET['employee_id']); ?>
	<form action="core/handleForms.php?employee_id=<?php echo $_GET['employee_id']; ?>" method="POST">
		<p>
			<label for="first_name">First Name:</label> 
			<input type="text" name="first_name" value="<?php echo $getEmployeesById['first_name']; ?>">
		</p>
		<p>
			<label for=" last_name">Last Name:</label> 
			<input type="text" name="last_name" value="<?php echo $getEmployeesById['last_name']; ?>">
		</p>
        <p>
		<label for="position">Position:</label>
            <select name="position" id="position" required>
                <option value="">--Select Type--</option>
                <option value="Detailer">Detailer</option>
                <option value="Manager">Manager</option>
                <option value="Quality Control Specialist">Quality Control Specialist</option>
                <option value="Customer Service Representative">Customer Service Representative</option>
            </select>
        </p>
		<p>
			<label for="hire_date">Hire Date:</label>
			<input type="date" name="hire_date" value="<?php echo $getEmployeesById['hire_date']; ?>">
		</p>
		<p>
			<label for="salary">Salary:</label>
			<input type="number" name="salary" value="<?php echo $getEmployeesById['salary']; ?>">
		</p>
		<p>
			<label for="phone_number">Phone Number:</label>
			<input type="text" name="phone_number" value="<?php echo $getEmployeesById['phone_number']; ?>">
		</p>
        <p>
			<label for="email">Email:</label>
			<input type="text" name="email" value="<?php echo $getEmployeesById['email']; ?>">
			<input type="submit" name="editUserBtn">
		</p>

	</form>
</body>
</html>