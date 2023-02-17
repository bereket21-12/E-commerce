<?php
// Display error messages if any
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "./database/Dbcontroller.php";

$db = new DBConnection();
$conn = $db->getConnection();

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


if (isset($_POST['submit'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $hasError = false;
    $emailErr = "";
    $confirmPassword = 1;
    // Validate email
    if (empty($_POST['email'])) {
        $emailErr = "Email is required";
        $hasError = true;
    } else {
        $email = test_input($_POST['email']);
        // Check if email address is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $hasError = true;
        } else {
            // Check if email is already in use
            $sql = "SELECT * FROM Customer WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $emailErr = "Email already in use";
                $hasError = true;
            }
        }
    }

    if (!$hasError) {
        $sql = "INSERT INTO Customer (first_name,last_name,email,password,address,confirmed,username) VALUES (?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $hashed_password = md5($password);

        $stmt->bind_param("sssssss", $firstName, $lastName, $email, $hashed_password, $address, $confirmPassword, $username);

        if ($stmt->execute()) {
            echo "Information submitted successfully";
            session_start();
            $_SESSION["email"] = $email;
            header("Location: login.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}

mysqli_close($conn);