<?php
include_once('function.php');
$students = new showstudentrecord();
$students = $students->showdata(); // Fetch student data and store it in $students array

$serachingstudentrecord = new serarchingstudent();
$serachingstudentrecord = $serachingstudentrecord->seraching();
?>

<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: Arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid ;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

.center{
  text-align: center;
}


.topnav {
  overflow: hidden;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="topnav">

  <div class="search-container">
    <form action="#" method="post">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit" name="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>
<h2 class="center">Student Record 2024</h2>

<table>
  <tr>
    <th>Student Id</th>
    <th>Student Name</th>
    <th>Student Last Name</th>
    <th>Student Date of Birth</th>
    <th>Student Gender</th>
    <th>Student Email</th>
    <th>Student Address</th>
    <th>Student Phone No</th>
    <th>Student Program</th>
    <th>Enrollment Date</th>
  </tr>

  <!-- Check if $students contains data -->
  <?php if (is_array($students) && count($students) > 0): ?>
    <?php foreach($students as $student): ?>
    <tr>
      <td><?php echo $student['student_id'] ?></td>
      <td><?php echo $student['first_name'] ?></td>
      <td><?php echo $student['last_name'] ?></td>
      <td><?php echo $student['date_of_birth'] ?></td>
      <td><?php echo $student['gender'] ?></td>
      <td><?php echo $student['email'] ?></td>
      <td><?php echo $student['address'] ?></td>
      <td><?php echo $student['phone'] ?></td>
      <td><?php echo $student['program_id'] ?></td>
      <td><?php echo $student['enrollment_date'] ?></td>
    </tr>
    <?php endforeach; ?>
  <?php else: ?>
    <tr>
      <td colspan="10">No student data found.</td>
    </tr>
  <?php endif; ?>
</table>

</body>
</html>
