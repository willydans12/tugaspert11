<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hotel Dashboard - Home</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Animate.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <style>
    body { 
      font-family: 'Poppins', sans-serif; 
      background: #f8f9fa;
      padding-top: 70px;
    }
    .navbar { background: rgba(0,0,0,0.7); }
    .navbar-brand, .nav-link { color: #fff !important; }
    .carousel-caption { background: rgba(0,0,0,0.4); padding: 1rem; border-radius: .5rem; }
    .section-title {
      font-weight: 700;
      margin: 2rem 0 1rem;
      text-align: center;
      position: relative;
    }
    .section-title::after {
      content: "";
      width: 60px; height: 4px;
      background: #D4AF37;
      position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%);
    }
    .card-room img { height: 200px; object-fit: cover; }
    .card-room .card-body { background: rgba(255,255,255,0.9); }
    .facility-icon { font-size: 2.5rem; color: #D4AF37; }
    footer {
      background: #111;
      color: #ccc;
      padding: 2rem 0;
    }
    footer a { color: #D4AF37; text-decoration: none; }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">MyHotel</a>
      <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span><i class="fa fa-bars"></i></span>
      </button>
      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#rooms">Rooms</a></li>
          <li class="nav-item"><a class="nav-link" href="#facilities">Facilities</a></li>
          <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Carousel -->
  <section id="home">
    <div id="hotelCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <?php
        $slides = [
          [
            'img' => 'https://images.unsplash.com/photo-1568495248636-6432a6ce8a64?auto=format&fit=crop&w=1350&q=80',
            'title' => 'Welcome to MyHotel',
            'text' => 'Experience luxury & comfort.'
          ],
          [
            'img' => 'https://images.unsplash.com/photo-1563371354-220ef9964a13?auto=format&fit=crop&w=1350&q=80',
            'title' => 'Elegant Rooms',
            'text' => 'Designed for your relaxation.'
          ],
          [
            'img' => 'https://images.unsplash.com/photo-1496412705862-e0088f16f791?auto=format&fit=crop&w=1350&q=80',
            'title' => 'Swimming Pool',
            'text' => 'Unwind by the water.'
          ]
        ];
        foreach($slides as $i => $s): ?>
        <div class="carousel-item <?= $i===0?'active':'' ?>">
          <img src="<?= $s['img'] ?>" class="d-block w-100" alt="<?= $s['title'] ?>">
          <div class="carousel-caption animate__animated animate__fadeInDown">
            <h3><?= $s['title'] ?></h3>
            <p><?= $s['text'] ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#hotelCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#hotelCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  </section>

  <!-- About -->
  <section class="container animate__animated animate__fadeInUp">
    <h2 class="section-title">About Our Hotel</h2>
    <p class="text-center mx-auto" style="max-width:700px;">
      MyHotel offers world-class hospitality with elegantly designed rooms, 
      top-notch facilities, and a commitment to personalized service. 
      Located in the heart of the city, we bring you closer to local attractions 
      while providing a peaceful retreat.
    </p>
  </section>

  <!-- Rooms & Types -->
  <section id="rooms" class="container animate__animated animate__fadeInUp">
    <h2 class="section-title">Our Rooms</h2>
    <div class="row g-4">
      <?php
      $rooms = [
        ['img'=>'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=600&q=60',
         'title'=>'Deluxe Room','text'=>'King bed, city view, free Wi-Fi.','price'=>'Rp 800.000/night'],
        ['img'=>'https://images.unsplash.com/photo-1576677632441-6bf1d5ad9cbb?auto=format&fit=crop&w=600&q=60',
         'title'=>'Suite','text'=>'Living area, minibar, ocean view.','price'=>'Rp 1.500.000/night'],
        ['img'=>'https://images.unsplash.com/photo-1582719478174-1d786c596f57?auto=format&fit=crop&w=600&q=60',
         'title'=>'Standard Room','text'=>'Queen bed, garden view.','price'=>'Rp 500.000/night'],
      ];
      foreach($rooms as $r): ?>
      <div class="col-md-4">
        <div class="card card-room h-100 shadow-sm">
          <img src="<?= $r['img'] ?>" class="card-img-top" alt="<?= $r['title'] ?>">
          <div class="card-body">
            <h5 class="card-title"><?= $r['title'] ?></h5>
            <p class="card-text"><?= $r['text'] ?></p>
            <span class="badge bg-warning text-dark"><?= $r['price'] ?></span>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- Facilities -->
  <section id="facilities" class="container animate__animated animate__fadeInUp">
    <h2 class="section-title">Our Facilities</h2>
    <div class="row text-center g-4">
      <?php
      $fac = [
        ['icon'=>'fa-wifi','label'=>'Free Wi-Fi'],
        ['icon'=>'fa-utensils','label'=>'Restaurant'],
        ['icon'=>'fa-swimmer','label'=>'Swimming Pool'],
        ['icon'=>'fa-dumbbell','label'=>'Gym'],
      ];
      foreach($fac as $f): ?>
      <div class="col-sm-6 col-md-3">
        <i class="fa <?= $f['icon'] ?> facility-icon"></i>
        <p class="mt-2"><?= $f['label'] ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- Footer -->
  <footer class="mt-5">
    <div class="container text-center">
      <p>&copy; <?= date('Y') ?> MyHotel. All Rights Reserved.</p>
      <p>
        <a href="#">Privacy Policy</a> |
        <a href="#">Terms of Service</a>
      </p>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
