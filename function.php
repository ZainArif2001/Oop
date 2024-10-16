<?php
class database
{
    protected $con;

    public function connect()
{
    if (!defined('DB_SERVER')) {
        define('DB_SERVER', 'localhost');
    }
    if (!defined('DB_USER')) {
        define('DB_USER', 'root');
    }
    if (!defined('DB_PASS')) {
        define('DB_PASS', '');
    }
    if (!defined('DB_NAME')) {
        define('DB_NAME', 'newportuniversity');
    }

    $this->con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

    if ($this->con == false) {
        die("Database Not Connected: " . mysqli_connect_error());
    }

    return $this->con;
}

}






class student extends database
{
    public function createstudent()
    {
        $con = $this->connect();  // Database connection le rahe hain

        if (isset($_POST['add'])) {
            // Form se data le rahe hain aur sanitize kar rahe hain
            $std_name = $_POST['std_name'];
            $std_lastname = $_POST['std_lastname'];
            $std_date = $_POST['std_date']; // Date of Birth
            $std_gender = $_POST['std_gender'];
            $std_email = $_POST['std_email'];
            $std_phone = $_POST['std_phone'];
            $std_address = $_POST['std_address'];
            $std_program = intval($_POST['std_program']);  // Ensure integer
            $std_enrollment = $_POST['std_enrollment']; // Enrollment Date

            // Check karein ke program_id exist karta hai ya nahis
            $programCheckQuery = "SELECT * FROM program WHERE program_id = ?";
            $stmt = $con->prepare($programCheckQuery);
            $stmt->bind_param("i", $std_program);
            $stmt->execute();
            $programCheckResult = $stmt->get_result();

            if ($programCheckResult->num_rows > 0) {
                // Prepare the insert statement
                $insertQuery = "INSERT INTO student (first_name, last_name, date_of_birth, gender, email, address, phone, enrollment_date, program_id) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

                $stmt = $con->prepare($insertQuery);
                $stmt->bind_param("ssssssssi", $std_name, $std_lastname, $std_date, $std_gender, $std_email, $std_address, $std_phone, $std_enrollment, $std_program);

                // Execute the insert statement
                if ($stmt->execute()) {
                    echo "<script>alert('Student added successfully!');</script>";
                } else {
                    echo "Error adding student: " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "Invalid program selected. Please choose a valid program.";
            }
        }
    }
}





class showstudentrecord extends database
{
    public function showdata()
    {
        // Connect to the database
        $con = $this->connect();

        // SQL query to fetch all student records
        $querycheck = "SELECT * FROM student";

        // Execute the query
        $result = $con->query($querycheck);

        // Check if the query returned rows
        if ($result->num_rows > 0) {
            // Fetch all rows into an array
            $students = [];
            while ($row = $result->fetch_assoc()) {
                $students[] = $row;
            }
            return $students; // Return the array of student records
        } else {
            return []; // Return an empty array if no records found
        }
    }
}

class serarchingstudent extends showstudentrecord
{
    public function seraching()
    {
        $con = $this->connect();

        if (isset($_POST['submit'])) {
            $seraching = $_POST['search'];  // Search input (assumed to be student_id)
            $search = "SELECT * FROM student WHERE student_id = ?";  // Query to find a student by ID

            // Use prepared statements for security
            $stmt = $con->prepare($search);
            $stmt->bind_param("i", $seraching);  // Assuming student_id is an integer
            $stmt->execute();
            $result = $stmt->get_result();

            // Check if we got a result
            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();  // Fetch single row
                echo '<thead>
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
                      </thead>';
                echo '<tbody>
                        <tr>
                            <td>' . $row['student_id'] . '</td>
                            <td>' . $row['first_name'] . '</td>
                            <td>' . $row['last_name'] . '</td>
                            <td>' . $row['date_of_birth'] . '</td>
                            <td>' . $row['gender'] . '</td>
                            <td>' . $row['email'] . '</td>
                            <td>' . $row['address'] . '</td>
                            <td>' . $row['phone'] . '</td>
                            <td>' . $row['program_id'] . '</td>
                            <td>' . $row['enrollment_date'] . '</td>
                        </tr>
                      </tbody>';
            } else {
                echo "<h2>Data Not Found</h2>";
            }
        } else {
            echo "Search form not submitted.";
        }
    }
}


