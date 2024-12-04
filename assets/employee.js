$(document).ready(function () {
    $('#submitBtn').click(function () {
        let isValid = true;
        $('.error').text(''); // Clear previous error messages

        // Validation - Start 
        if ($('#name').val().trim() === '') {
            isValid = false;
            $('#nameError').text('Name is required.');
        }
        if ($('#gender').val() === '') {
            isValid = false;
            $('#genderError').text('Gender is required.');
        }
        if ($('#maritalStatus').val() === '') {
            isValid = false;
            $('#maritalStatusError').text('Marital status is required.');
        }
        if (!/^\d{10}$/.test($('#phone').val().trim())) {
            isValid = false;
            $('#phoneError').text('Phone number must be 10 digits.');
        }
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test($('#email').val().trim())) {
            isValid = false;
            $('#emailError').text('Invalid email address.');
        }
        if ($('#address').val().trim() === '') {
            isValid = false;
            $('#addressError').text('Address is required.');
        }
        if ($('#dob').val() === '') {
            isValid = false;
            $('#dobError').text('Date of birth is required.');
        }
        if ($('#nationality').val().trim() === '') {
            isValid = false;
            $('#nationalityError').text('Nationality is required.');
        }
        if ($('#hireDate').val() === '') {
            isValid = false;
            $('#hireDateError').text('Hire date is required.');
        }
        if ($('#department').val().trim() === '') {
            isValid = false;
            $('#departmentError').text('Department is required.');
        }
        // Validation - End 

        if (isValid) {
            const formData = {
                name: $('#name').val().trim(),
                gender: $('#gender').val(),
                maritalStatus: $('#maritalStatus').val(),
                phone: $('#phone').val().trim(),
                email: $('#email').val().trim(),
                address: $('#address').val().trim(),
                dob: $('#dob').val(),
                nationality: $('#nationality').val().trim(),
                hireDate: $('#hireDate').val(),
                department: $('#department').val().trim()
            };

            $.ajax({
                url: '../api/add_employee.php',
                type: 'POST',
                data: formData,
                success: function (response) {
                    if (response) {
                        let output = JSON.parse(response);
                        if (output.status == 0) {
                            alert(output.msg);
                            window.location.href = "show_employee.php";
                        }
                        else {
                            alert(output.msg);
                        }
                    }
                },
                error: function () {
                    alert('An error occurred. Please try again.');
                }
            });
        }

    });
});