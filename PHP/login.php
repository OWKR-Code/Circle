<?php
// Start the session
session_start();

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$localCon = new mysqli("localhost", "root", "", "Circle");
if ($localCon->connect_error) {
    die("Connection failed: " . $localCon->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get username and password from the form
    $username = trim($_POST['IDENT']);
    $password = trim($_POST['PASSWORD']);

    if (empty($username) || empty($password)) {
        echo "Username and password fields cannot be empty!";
        exit();
    }

    // Use prepared statement to fetch the user
    $query = "SELECT * FROM `USERS` WHERE `username` = ?";
    $stmt = $localCon->prepare($query);
    if ($stmt === false) {
        die("Error in SQL prepare: " . $localCon->error);
    }

    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $DB_PASSWORD = $row['password']; // Hashed password stored in DB

        // Verify the password
        if (password_verify($password, $DB_PASSWORD)) {
            // Set session variables
            $_SESSION['USERNAME'] = $row['username'];
            $_SESSION['NAME'] = $row['fullName'];
            $_SESSION['CIRCLE'] = checkIfUserInCircle($row['ID'], $localCon, $row['CircleID']);

            // Redirect to the homepage after successful login
            header("Location: /Circle/index.php");
            exit();
        } else {
            echo "Invalid credentials!";
        }
    } else {
        echo "User not found!";
    }
    $stmt->close();
}

// Function to check if the user is in the circle
function checkIfUserInCircle($DB_ID, $localCon, $DB_CIRCLED_ID) {
    $query = "SELECT * FROM `CIRCELS` WHERE `ID` = ?";
    $stmt = $localCon->prepare($query);
    if ($stmt === false) {
        die("Error in SQL prepare: " . $localCon->error);
    }

    $stmt->bind_param('i', $DB_CIRCLED_ID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Set circle-related session variables
        $_SESSION["DB_QUERY_CIRCLE_NAME"] = $row['name'];
        $_SESSION['DB_QUERY_CIRCLE_ID'] = $row['ID'];
        return $row['ID'];
    } else {
        return null;
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Circle | Login</title>
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

        .forget {
            width: 100%;
            padding: 10px 0;
            background-color: transparent;
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 15px;
        }

        .forget:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .con {
            margin-top: 20px;
            color: #6f6767;
            font-size: 14px;
        }

        .con a {
            color: #0088ff;
            text-decoration: none;
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <form class="form" method="post">
        <p class="login">Log in to Circle</p>
        <div class="inputContainer">
            <input placeholder="Username" type="text" class="fInput" name="IDENT" required>
            <input placeholder="Enter your password" type="password" class="fInput" name="PASSWORD" required>
        </div>
        <button type="submit" class="submit">Next</button>
        <button type="button" class="forget">Forgot password?</button>
        <div class="con">
            <p>Don't have an account?</p>
            <a href="signup.php">Sign up</a>
        </div>
    </form>
</body>
</html>
