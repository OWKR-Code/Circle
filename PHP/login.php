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
  <form class="form">
    <p class="login">Log in to Circle</p>
    <div class="inputContainer">
      <input placeholder="Phone, email, or username" type="text" class="fInput">
      <input placeholder="Enter your password" type="password" class="fInput">
    </div>
    <button type="button" class="submit">Next</button>
    <button type="button" class="forget">Forgot password?</button>
    <div class="con">
      <p>Don't have an account?</p>
      <a href="signup.php">Sign up</a>
    </div>
  </form>
</body>
</html>
