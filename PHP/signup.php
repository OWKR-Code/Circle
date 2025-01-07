<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    $con = new mysqli("localhost", "root", "", "Circle");
// Include database connection


$error = ""; // To store error messages

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = trim($_POST['fullName']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validate input fields
    if (empty($fullName) || empty($email) || empty($username) || empty($password) || empty($confirmPassword)) {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } elseif ($password !== $confirmPassword) {
        $error = "Passwords do not match.";
    } else {
        // Check if the username already exists
        $stmt = $con->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error = "Username already exists.";
        } else {
            // Insert new user into the database
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $con->prepare("INSERT INTO users (fullName, email, username, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $fullName, $email, $username, $hashedPassword);

            if ($stmt->execute()) {
                echo "<script>alert('Account created successfully!'); window.location.href='login.php';</script>";
                exit;
            } else {
                $error = "Failed to create account. Please try again.";
            }
        }
        $stmt->close();
    }
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Circle | Create Account</title>
<style>
  body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    background-color: #121212;
    font-family: Arial, sans-serif;
  }

  .form {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 400px;
    padding: 30px;
    background-color: black;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
  }

  .login {
    color: white;
    font-weight: bold;
    font-size: 24px;
    margin-bottom: 20px;
  }

  .error {
    color: red;
    font-size: 14px;
    margin-bottom: 15px;
    text-align: center;
  }

  .inputContainer {
    width: 100%;
    margin-bottom: 20px;
  }

  .fInput {
    width: 100%;
    height: 50px;
    border: 1px solid #303030;
    border-radius: 5px;
    background-color: black;
    padding: 10px;
    color: white;
    margin-bottom: 15px;
    transition: border-color 0.2s, background-color 0.2s;
  }

  .fInput:focus {
    border-color: #0088ff;
    outline: none;
  }

  .fInput::placeholder {
    color: #888;
  }

  .submit {
    width: 100%;
    padding: 10px 0;
    background-color: #0088ff;
    color: white;
    border: none;
    border-radius: 25px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: opacity 0.2s;
  }

  .submit:hover {
    opacity: 0.9;
  }

  .login-link {
    margin-top: 20px;
    color: #6f6767;
    font-size: 14px;
  }

  .login-link a {
    color: #0088ff;
    text-decoration: none;
    margin-left: 5px;
  }
</style>
</head>
<body>
  <form class="form" method="POST">
    <p class="login">Create a Circle Account</p>
    <?php if ($error): ?>
      <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <div class="inputContainer">
      <input placeholder="Full Name" name="fullName" type="text" class="fInput" value="<?= htmlspecialchars($_POST['fullName'] ?? '') ?>">
      <input placeholder="Email Address" name="email" type="email" class="fInput" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
      <input placeholder="Username" name="username" type="text" class="fInput" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
      <input placeholder="Password" name="password" type="password" class="fInput">
      <input placeholder="Confirm Password" name="confirmPassword" type="password" class="fInput">
    </div>
    <button type="submit" class="submit">Sign Up</button>
    <div class="login-link">
      <p>Already have an account?</p>
      <a href="login.php">Log in</a>
    </div>
  </form>
</body>
</html>
