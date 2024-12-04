<?php
$file = '../api/employees.json';
$employees = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Information</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="header-section">
        <div class="left-container">
            <h2>Employee Profiles</h2>
        </div>
        <div class="right-container">
            <a href="employee.html" class="add-btn">Add Employee</a>
        </div>
    </div>
    


    <?php if (!empty($employees)): ?>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Marital Status</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>DOB</th>
                    <th>Nationality</th>
                    <th>Hire Date</th>
                    <th>Department</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employees as $employee): ?>
                    <tr>
                        <td><?= isset($employee['name']) ? $employee['name'] : "" ?></td>
                        <td><?= isset($employee['gender']) ? $employee['gender'] : "" ?></td>
                        <td><?= isset($employee['maritalStatus']) ? $employee['maritalStatus'] : "" ?></td>
                        <td><?= isset($employee['phone']) ? $employee['phone'] : "" ?></td>
                        <td><?= isset($employee['email']) ? $employee['email'] : "" ?></td>
                        <td><?= isset($employee['address']) ? $employee['address'] : "" ?></td>
                        <td><?= isset($employee['dob'])  ?  $employee['dob'] : "" ?></td>
                        <td><?= isset($employee['nationality'])  ? $employee['nationality'] : "" ?></td>
                        <td><?= isset($employee['hireDate']) ? $employee['hireDate'] : "" ?></td>
                        <td><?= isset($employee['department']) ? $employee['department'] : "" ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No record found.</p>
    <?php endif; ?>
</body>
</html>
