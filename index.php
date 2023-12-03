<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign In</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box; 
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      line-height: 1.4;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      background: linear-gradient(to right bottom, #f7f6f3, #e2e4eb);
    }

    .container {
      width: 400px;
      padding: 30px;
      background-color: burlywood;
      border-radius: 15px;
      box-shadow: 0 2.4rem 4.8rem rgba(0, 0, 0, 0.15);
    }

    .login-title {
      font-size: 32px;
      font-weight: 600;
      text-align: center;
      margin-bottom: 20px;
    }

    .login-form {
      display: grid;
      gap: 16px;
    }

    .login-form label {
      font-size: 18px;
    }

    .login-form input {
      width: 100%;
      padding: 12px;
      border-radius: 9px;
      border: none;
      margin-top: 8px;
    }

    .login-form input:focus {
      outline: none;
      box-shadow: 0 0 0 4px rgba(253, 242, 233, 0.5);
    }

    .btn--form {
      background-color: #B7410E;
      color: #f0e8e2;
      padding: 12px;
      border: none;
      border-radius: 9px;
      cursor: pointer;
      font-size: 20px;
      transition: background-color 0.3s, color 0.3s;
      margin-top: 20px;
      width: 100%;
    }

    .btn--form:hover {
      background-color: #953507;
    }

    img {
      display: block;
      margin: 0 auto;
      width: 60%;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="login-title">WELCOME TO STOCK MANAGEMENT SYSTEM</div>
    
    <form class="login-form" action="login_process.php" method="post">
      <label for="username">Username:</label>
      <input id="username" type="text" name="username" required />

      <label for="password">Password:</label>
      <input id="password" type="password" name="password" required />

      <button name="btnlogin" class="btn btn--form" type="submit">Log In</button>
    </form>
  </div>
</body>
</html>