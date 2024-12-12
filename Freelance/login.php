<?php
include 'db.php';
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" href="assets/icon.png" />
    <title>Login - Freelance Platform</title>
    <link rel="stylesheet" href="login.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Roboto:wght@500;700&display=swap"
      rel="stylesheet"
    />
  </head>

  <body>
   
    <div class="video-container">
      <video autoplay loop muted playsinline>
        <source src="assets/ini_vidio.mp4" type="video/mp4" />
        Your browser does not support the video tag.
      </video>
    </div>

  
    <div class="login-container">
      <div class="login-form">
        <h2>Login</h2>
        <form action="login_process.php" method="POST">
          <input
            class="input"
            type="text"
            name="username"
            placeholder="Username"
            required
          />
          <input
            class="input"
            type="password"
            name="password"
            placeholder="Password"
            required
          />
          <button class="btn_login" type="submit" name="login">Login</button>
        </form>
        <p class="link-register">
          Belum punya akun? <a href="register.php">Daftar di sini</a>
        </p>
      </div>
    </div>
  </body>
</html>
