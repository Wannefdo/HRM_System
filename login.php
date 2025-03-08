<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role']; // Include role selection from the form

    try {
        // Check if the user exists in the database
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Verify the hashed password
            if (password_verify($password, $user['password'])) {
                // Check if the selected role matches the user's role
                if ($user['role'] === $role) {
                    // Start the session and set user data
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['full_name'];
                    $_SESSION['user_role'] = $user['role'];

                    // Redirect based on user role
                    if ($role === 'Admin') {
                        echo "<script>
                                alert('Login successful as Admin.');
                                window.location.href = 'admin_dashboard.php';
                              </script>";
                    } elseif ($role === 'Manager') {
                        echo "<script>
                                alert('Login successful as Manager.');
                                window.location.href = 'manager_dashboard.php';
                              </script>";
                    } elseif ($role === 'Employee') {
                        echo "<script>
                                alert('Login successful as Employee.');
                                window.location.href = 'employee_dashboard.php';
                              </script>";
                    }
                    exit();
                } else {
                    // Role mismatch
                    echo "<script>alert('Invalid role selected. Please try again.'); window.history.back();</script>";
                }
            } else {
                // Password mismatch
                echo "<script>alert('Invalid email or password.'); window.history.back();</script>";
            }
        } else {
            // Email not found
            echo "<script>alert('Invalid email or password.'); window.history.back();</script>";
        }
    } catch (PDOException $e) {
        // Database error
        echo "<script>alert('Error: " . addslashes($e->getMessage()) . "'); window.history.back();</script>";
    }
}
?>

