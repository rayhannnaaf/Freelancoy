<?php 
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" href="assets/icon.png" />
    <title>Freelance Platform</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Roboto:wght@500;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <style>
    .modal-container {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.6);
      }

      .modal-dialog {
        position: relative;
        margin: 10% auto;
        padding: 20px;
        background: white;
        border-radius: 8px;
        max-width: 400px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
      }

      .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #ddd;
      }

      .modal-header h1 {
        font-size: 18px;
        color :greenyellow;
      }

      .btn-close {
        cursor: pointer;
        background: transparent;
        border: none;
        font-size: 20px;
        color: red;
      }

      .modal-body {
        padding: 10px 0;
        font-size: 16px;
      }

      /* Button */
      .btn-open-popup {
        padding: 10px 20px;
        color: white;
        background-color: #007bff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }

      .btn-open-popup:hover {
        background-color: #0056b3;
      }
      </style>
  </head>

  <body>
    <div class="container">
      <header>
        <nav>
          <div class="logo">
            <img src="assets/logo.png" alt="Platform Logo" style="width:200px;height:200px;"/>
          </div>
          <label for="click" class="menu-btn"></label>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#">about</a></li>
            <li><a href="login.php" >Login</a></li>
          </ul>
        </nav>
      </header>

      <main>
        <div class="jumbotron">
          <div class="jumbotron-text">
            <h1>Find the Right Talent for Your Project</h1>
            <p>
              Explore top freelancers and bring your ideas to life. Get started today!
            </p>
            <button type="button" class="btn_getStarted" onclick="openPopup(); showToast('Modal Opened')">Get Started</button>
          </div>
          <div class="jumbotron-img">
            <img src="assets/ini_foto.jpg" alt="Freelance Platform" />
          </div>
        </div>

        <div class="cards-categories">
          <h2>Job Categories</h2>
          <div class="card-categories">
            <div class="card">
              <div class="card-image">
                <img src="assets/ini_foto_kartu_1.jpg" alt="Design" />
              </div>
              <div class="card-content">
                <h5>Graphic Design</h5>
                <p>
                  Find talented designers to create stunning visuals for your brand.
                </p>
                <button class="btn_browse" type="button" onclick="browseCategory('Graphic Design')">Browse</button>
              </div>
            </div>
            <div class="card">
              <div class="card-image">
                <img src="assets/ini_foto_kartu_2.jpg" alt="Development" />
              </div>
              <div class="card-content">
                <h5>Web Development</h5>
                <p>
                  Hire developers to build and optimize your websites or apps.
                </p>
                <button class="btn_browse" type="button" onclick="browseCategory('Web Development')">Browse</button>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>

 <div class="modal-container" id="popup">
        <div class="modal-dialog">
          <div class="modal-header">
            <h1 >Sign Up Now</h1>
            <button class="btn-close" onclick="closePopup()">&times;</button>
          </div>
          <div class="modal-body">
            <p>Join our community and start freelancing today!</p>
            <button class="btn-open-popup" onclick="alert('Form clicked!')">Sign Up</button>
          </div>
        </div>
      </div>
    </div>

    <script>
      let popup = document.getElementById("popup");

      function openPopup() {
        popup.style.display = "block";
      }
      function closePopup() {
        popup.style.display = "none";
      }
      window.onclick = function (event) {
        if (event.target === popup) {
          popup.style.display = "none";
        }
      };
    </script>
    
  </body>
</html>
