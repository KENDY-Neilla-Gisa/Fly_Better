<?php
// Database connection
$servername = "localhost";
$username = "root";  
$password = "1234";  
$database = "flybetter_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
    $country_code = $_POST['country_code'];
    $mobile_number = $_POST['mobile_number'];
    $title = $_POST['title'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $residence = $_POST['residence'];

    // Use a prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users (email, password, country_code, mobile_number, title, first_name, middle_name, last_name, date_of_birth, gender, residence) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", $email, $password, $country_code, $mobile_number, $title, $first_name, $middle_name, $last_name, $date_of_birth, $gender, $residence);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Close connection
$conn->close();
?>
