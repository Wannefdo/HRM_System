<?php 
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $role = $_POST['role'];

    // Password confirmation check
    if ($password !== $confirmPassword) {
        echo "<script>alert('Passwords do not match.'); window.history.back();</script>";
        exit();
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert into the database
    try {
        $stmt = $pdo->prepare("INSERT INTO users (full_name, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->execute([$fullName, $email, $hashedPassword, $role]);
        
        // Alert and reload the page for login
        echo "<script>
                alert('User registered successfully! Please login.');
                window.location.href = 'login.html'; // Redirect to your page with the login form visible
              </script>";
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) { // Duplicate email error
            echo "<script>alert('Email already exists.'); window.history.back();</script>";
        } else {
            echo "<script>alert('Error: " . $e->getMessage() . "'); window.history.back();</script>";
        }
    }
}
?>

