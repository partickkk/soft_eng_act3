<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		body {
			font-family: "Arial";
		}
		input {
			font-size: 1.5em;
			height: 50px;
			width: 200px;
		}
		table, th, td {
		  border:1px solid black;
		}
	</style>
</head>
<body>
	<h1>Delete Account?</h1>
	<?php $getEmployeesById = getEmployeesById($pdo, $_GET['employee_id']); ?>
	<form action="core/handleForms.php?employee_id=<?php echo $_GET['employee_id']; ?>" method="POST">

			<p>First Name: <?php echo $getEmployeesById['first_name']; ?></p>
			<p>Last Name: <?php echo $getEmployeesById['last_name']; ?></p>
			<p>Position: <?php echo $getEmployeesById['position']; ?></p>
			<p>Hire date: <?php echo $getEmployeesById['hire_date']; ?></p>
			<p>Salary: <?php echo $getEmployeesById['salary']; ?></p>
			<p>Phone Number: <?php echo $getEmployeesById['phone_number']; ?></p>
			<p>Email: <?php echo $getEmployeesById['email']; ?></p>

			<input type="submit" name="deleteUserBtn" value="Delete">
		</div>
	</form>
</body>
</html>