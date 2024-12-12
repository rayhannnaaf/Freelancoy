<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" href="assets/icon.png" />
    <title>Register - Freelance Platform</title>
    <link rel="stylesheet" href="register.css" />
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

    
    <div class="register-container">
      <div class="register-form">
        <h2>Daftar Akun</h2>
        <form action="register_process.php" method="POST">
          <input
            class="input"
            type="text"
            name="username"
            placeholder="Username"
            required
          />
          <input
            class="input"
            type="email"
            name="email"
            placeholder="Email"
            required
          />
          <input
            class="input"
            type="password"
            name="password"
            placeholder="Password"
            required
          />
          <input
            class="input"
            type="password"
            name="confirm_password"
            placeholder="Confirm Password"
            required
          />
          <button class="btn_register" type="submit" name="register">Daftar</button>
        </form>
      </div>
    </div>
  </body>
</html>
