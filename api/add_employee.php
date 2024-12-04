<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;

    // Validate fields
    $errors = [];
    if (empty($data['name'])) $errors[] = 'Name is required.';
    if (empty($data['gender'])) $errors[] = 'Gender is required.';
    if (empty($data['maritalStatus'])) $errors[] = 'Marital status is required.';
    if (!preg_match('/^\d{10}$/', $data['phone'])) $errors[] = 'Phone number must be 10 digits.';
    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) $errors[] = 'Invalid email.';
    if (empty($data['address'])) $errors[] = 'Address is required.';
    if (empty($data['dob'])) $errors[] = 'Date of birth is required.';
    if (empty($data['nationality'])) $errors[] = 'Nationality is required.';
    if (empty($data['hireDate'])) $errors[] = 'Hire date is required.';
    if (empty($data['department'])) $errors[] = 'Department is required.';

    if (!empty($errors)) {
        echo implode("\n", $errors);
        exit;
    }

    // Save data to a JSON file
    $file = 'employees.json';
    $employees = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
    $employees[] = $data;

    $output = new stdClass();
    if (file_put_contents($file, json_encode($employees, JSON_PRETTY_PRINT))) {
        $output->msg = 'Employee added successfully';
        $output->status = 0;
        echo json_encode($output);
    } else {
        $output->msg = 'Failed to save employee data';
        $output->status = 1;
        echo json_encode($output);
    }
}
?>
