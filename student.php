<?php include('function.php');
$student = new student;
$student->createstudent();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 50px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="tel"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Student Registration Form</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="std_name" placeholder="Enter your first name" required>
        </div>

        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="std_lastname" placeholder="Enter your last name" required>
        </div>

        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" id="dob" name="std_date" required>
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <select id="gender" name="std_gender" required>
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="std_email" placeholder="Enter your email" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="std_phone" placeholder="Enter your phone number" required>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" id="address" name="std_address" placeholder="Enter your address" required>
        </div>

        <div class="form-group">
            <label for="program">Program</label>
            <input type="text" id="address" name="std_program" placeholder="Enter your address" required>

        </div>

        <div class="form-group">
            <label for="enrollment_date">Enrollment Date</label>
            <input type="date" id="enrollment_date" name="std_enrollment" required>
        </div>

        <input type="submit" name="add" value="Register">
    </form>
</div>
</body>
</html>








