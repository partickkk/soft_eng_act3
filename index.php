<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees Registration</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h3>Welcome Employees!</h3>
    <p>Please enter Employees information to register an account:</p>
    <form action="core/handleForms.php" method="POST">
    <p>
			<label for="first_name">First Name:</label> 
			<input type="text" name="first_name" id ="first_name" required>
		</p>
		<p>
			<label for=" last_name">Last Name:</label> 
			<input type="text" name="last_name" id ="last_name" required>
		</p>
        <p>
		<label for="position">Posistion:</label>
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
			<input type="date" name="hire_date" id ="hire_date" required>
		</p>
		<p>
			<label for="salary">Salary:</label>
			<input type="number" name="salary" id ="salary" required>
		</p>
		<p>
			<label for="phone_number">Phone Number:</label>
			<input type="text" name="phone_number" id ="phone_number" required>
		</p>
        <p>
			<label for="email">Email:</label>
			<input type="text" name="email" id ="email" required>
		</p>
        <p>
            <button type="submit" name="register">Register</button>
        </p>
    </form>

    <h3>Employees Record</h3>
    <table> 
        <tr>
            <th>Employee id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Position</th>
            <th>Hire Date</th>
            <th>Salary</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php
        // Corrected function call and variable naming
        $allUserAccounts = seeAllEmployees($pdo);
        if (!empty($allUserAccounts)) {
            foreach ($allUserAccounts as $row) {
        ?>
        <tr>
            <td><?php echo ($row['employee_id']); ?></td>
            <td><?php echo ($row['first_name']); ?></td>
            <td><?php echo ($row['last_name']); ?></td>
            <td><?php echo ($row['position']); ?></td>
            <td><?php echo ($row['hire_date']); ?></td>
            <td><?php echo ($row['salary']); ?></td>
            <td><?php echo ($row['phone_number']); ?></td>
            <td><?php echo ($row['email']); ?></td>
            <td class="action-links">
                <a href="edituser.php?employee_id=<?php echo urlencode($row['employee_id']); ?>">Edit</a>
                <a href="deleteuser.php?employee_id=<?php echo urlencode($row['employee_id']); ?>" onclick="return confirm('Delete employee account?');">Delete</a>
            </td>
        </tr>
        <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="8">No Records Found!</td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>