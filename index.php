<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit;
}
$error = isset($_GET['error']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hotel Dashboard Login</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Animate.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;700&display=swap" rel="stylesheet">

  <style>
    html, body {
      margin: 0;
      height: 100vh;
      width: 100vw;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Montserrat', sans-serif;
      background: url('https://images.unsplash.com/photo-1558979158-65a1eaa08691?auto=format&fit=crop&w=1350&q=80') center/cover no-repeat;
      position: relative;
      overflow: hidden;
    }
    /* full-screen dark vignette */
    body::before {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(0,0,0,0.7);
      z-index: 0;
    }
    .login-card {
      position: relative;
      z-index: 1;
      width: 100%;
      max-width: 450px;
      padding: 2rem 2.5rem;
      border-radius: 1rem;
      background: rgba(255,255,255,0.1);
      border: 2px solid #D4AF37;
      box-shadow: 0 8px 30px rgba(0,0,0,0.8);
      animation: zoomIn 0.6s;
    }
    .login-card h2 {
      color: #fff;
      text-align: center;
      margin-bottom: 1.5rem;
      font-weight: 700;
    }
    .form-control {
      box-sizing: border-box;
      width: 100%;
      height: 50px;
      padding: 0 1rem;
      border: 2px solid #D4AF37;
      border-radius: .5rem;
      background: rgba(255,255,255,0.2);
      color: #fff;
      font-size: 1rem;
    }
    .form-control::placeholder {
      color: rgba(255,255,255,0.75);
    }
    .form-control:focus {
      background: rgba(255,255,255,0.3);
      border-color: #D4AF37;
      box-shadow: 0 0 0 0.2rem rgba(212,175,55,0.5);
      outline: none;
    }
    .password-wrapper {
      position: relative;
    }
    .toggle-password {
      position: absolute;
      top: 50%;
      right: 1rem;
      transform: translateY(-50%);
      cursor: pointer;
      color: rgba(255,255,255,0.85);
      font-size: 1.2rem;
    }
    .btn-gold {
      width: 100%;
      padding: 0.75rem;
      font-size: 1rem;
      background: #D4AF37;
      color: #000;
      font-weight: 600;
      border: none;
      border-radius: 0.5rem;
      transition: background .3s;
      animation: pulse 2s infinite;
    }
    .btn-gold:hover {
      background: #b89c2d;
    }
    .btn-container {
      margin-top: 1.5rem;
    }
    .alert {
      background: rgba(255,255,255,0.15);
      color: #ffdddd;
      border: 1px solid #ff4444;
      margin-bottom: 1rem;
    }
  </style>
</head>
<body>
  <div class="login-card">
    <h2>Hotel Admin Login</h2>
    <?php if ($error): ?>
      <div class="alert animate__animated animate__shakeX" role="alert">
        Username atau password salah!
      </div>
    <?php endif; ?>
    <form method="post" action="process_login.php">
      <div class="mb-4">
        <input
          type="text"
          name="username"
          class="form-control"
          placeholder="Username"
          required
        >
      </div>
      <div class="mb-4 password-wrapper">
        <input
          type="password"
          name="password"
          id="password"
          class="form-control"
          placeholder="Password"
          required
        >
        <i class="fa fa-eye toggle-password" id="togglePassword"></i>
      </div>
      <div class="btn-container">
        <button
          type="submit"
          name="login"
          class="btn-gold"
        >
          Log In
        </button>
      </div>
    </form>
  </div>

  <script>
    const toggle = document.getElementById('togglePassword');
    const pwd    = document.getElementById('password');
    toggle.addEventListener('click', () => {
      const type = pwd.type === 'password' ? 'text' : 'password';
      pwd.type = type;
      toggle.classList.toggle('fa-eye-slash');
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
