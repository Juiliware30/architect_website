<?php
// Include db
include 'db_config.php';

// Fetch images carousel
$results = $conn->query("SELECT * FROM carousel_images ");

if (!$results) {
    die("Database query failed: " . $conn->error);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <script src="https://cdn.tailwindcss.com"></script>

    <style type="text/css">
        
@import url('https://fonts.googleapis.com/css2?family=Lora&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Lora&family=Ubuntu:wght@300;400;700&display=swap');
body {
    margin: 0;
    font-family: 'Lora', sans-serif;
    
}
        .social-nav {
            height: auto;
            background-color: #000;
            width: 100%;
            padding: 10px 0;
        }

        .social-nav .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .social-nav .left-section {
            flex: 1;
        }

        .social-nav .right-section {
            display: flex;
            align-items: center;
        }

        .social-nav ul {
            list-style: none;
            display: flex;
            align-items: center;
        }

        .social-nav ul li {
            margin-right: 15px;
        }

        .social-nav ul li a {
            display: inline-block;
            width: 30px;
            height: 30px;
            color: #fff;
            border-radius: 50%;
            text-align: center;
            line-height: 2.5;
            font-size: 12px;
            transition: background-color 0.3s;
            box-shadow: 1px 1px 1px 1px #f7fafc;
            background-color: #000;
        }

        .social-nav h6 {
            font-family: cursive;
            font-weight: 800;
            font-size: large;
            color: white;
            margin-right: 5px;
        }

        .social-nav ul li a:hover {
            background-color: rgb(46, 97, 164);
        }

        @media (max-width: 768px) {
            .social-nav .container {
                flex-direction: column;
                align-items: center; 
                text-align: center; 
            }

            .social-nav .left-section {
                margin-bottom: 10px; 
            }

            .social-nav .right-section {
                margin-bottom: 10px; 
            }

            .social-nav ul {
                flex-direction: row;
                justify-content: center;
                align-items: center;
            }

            .social-nav ul li {
                margin: 5px 10px;
            }
        }

        .second-nav {
            background-color: #000;
            width: 100%;
            border-bottom: 1px solid #ddd;
            position: sticky;
            top: 0;
            z-index: 999;
            padding: 10px 0;
        }

        .second-nav .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .second-nav .logo img {
            height: 40px;
        }

        .second-nav .ai-buttons {
            display: flex;
            align-items: center;
        }

        .second-nav .ai-dropdown {
            margin-right: 20px;
        }

        .second-nav .ai-dropdown .dropdown-menu {
            top: 100%;
            right: 0;
            margin-top: 10px;
            background-color: #000;
            border: 1px solid #ddd;
            color: #fff;
            display: none; 
        }

        .second-nav .ai-dropdown .dropdown-menu.show {
            display: block; 
        }

        .second-nav .ai-dropdown .dropdown-item {
            color: #fff;
        }

        .second-nav .ai-dropdown .dropdown-item:hover {
            background-color: rgb(46, 97, 164);
        }

        .second-nav .btn-ai,
        .second-nav .btn-consultation,
        .second-nav .btn-xyz {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            text-transform: uppercase;
            font-weight: bold;
            margin-left: 10px;
        }

        .second-nav .btn-ai {
            background-color: #17a2b8;
        }

        .second-nav .btn-ai:hover,
        .second-nav .btn-consultation:hover,
        .second-nav .btn-xyz:hover {
            background-color: #0056b3;
        }

        .second-nav .btn-consultation {
            background-color: #007bff;
        }

        .second-nav .btn-xyz {
            background-color: #17a2b8;
        }

        @media (max-width: 768px) {
            .second-nav .container {
                flex-direction: column;
                align-items: center;
                text-align: center; 
            }

            .second-nav .logo {
                margin-bottom: 10px; 
            }

            .second-nav .ai-buttons {
                flex-direction: row;
                justify-content: center;
                margin-top: 10px;
            }

            .second-nav .btn-ai,
            .second-nav .btn-consultation,
            .second-nav .btn-xyz {
                margin-left: 0; 
                margin-right: 10px; 
            }
        }

 /*caard1*/
         .card-wrapper {
      padding: 20px 0;
    }
    .card img {
      object-fit: cover;
      height: 200px;
    }
    @media (max-width: 576px) {
      .carousel-inner {
        margin: 0 auto;
        width: 100%;
      }
    }



        .carousel-control-prev, .carousel-control-next {
            background: transparent; 
            border:none;
        }

        .card-img-top {
            height: 200px; 
            object-fit: cover; 
        }

    #testimonialCarousel .carousel-item {
      height: 500px;
      background-size: cover;
      background-position: center;
      position: relative;
    }
    #testimonialCarousel .carousel-caption {
      position: absolute;
      bottom: 30px;
    }
    .testimonial-info {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }
    .testimonial-info img {
      border-radius: 50%;
      width: 80px;
      height: 80px;
    }
    .testimonial-info h5 {
      margin-top: 10px;
      color: white;
    }
    .testimonial-info p {
      color: white;
      margin-top: -5px;
    }
    .testimonial-text {
      font-size: 1.25rem;
      color: white;
      margin-top: 20px;
    }




.steps {
    display: flex;
    justify-content: center; 
    flex-wrap: wrap;
    gap: 20px;
}

.step {
    width: 100%; 
    max-width: 250px; 
    margin: 10px;
    padding: 20px;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

.step h3 {
    font-size: 1.25em; 
    margin-bottom: 10px;
}

.step p {
    font-size: 0.875em; 
    color: black;
    font-weight: 400;
}


@media (max-width: 576px) {
    .step h3 {
        font-size: 1.15em; 
    }

    .step p {
        font-size: 0.75em; 
    }
}

@media (min-width: 577px) and (max-width: 768px) {
    .step h3 {
        font-size: 1.2em; 
    }

    .step p {
        font-size: 0.85em; 
    }
}

@media (min-width: 769px) {
    .step h3 {
        font-size: 1.25em;
    }

    .step p {
        font-size: 0.875em; 
    }
}
      
        .modal {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            max-width: 600px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .modal-header {
            padding: 2px 16px;
            background-color: #5cb85c;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-body {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 20px 0;
            flex-wrap: wrap;
        }

        .modal-footer {
            padding: 2px 16px;
            background-color: #5cb85c;
            display: flex;
            justify-content: flex-end;
        }

        .modal-footer button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            margin-left: 10px;
            cursor: pointer;
        }

        .modal-footer button.close {
            background-color: #dc3545;
        }

        @media (max-width: 768px) {
            .modal-content {
                width: 90%;
                flex-direction: column;
                align-items: center;
            }

            .modal-body {
                flex-direction: column;
                gap: 10px;
            }

            .modal-body .card {
                width: 100%;
            }
        }

        .modal-body .card {
            background-color: white;
            border: 2px solid #ccc;
            border-radius: 8px;
            padding: 15px;
            flex: 1;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
            cursor: pointer;
        }

        .modal-body .card i {
            font-size: 24px;
            color: black;
        }

        .modal-body .card p {
            font-size: 16px;
            color: #333;
        }

        .modal-body .card:hover {
            transform: translateY(-10px);
            background-color: #d1f0f7;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .modal-body .card .btn {
            background-color: transparent;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
        }


    </style>
</head>
<body>
  
    <section class="navsection">
        <nav class="social-nav">
            <div class="container">
                <div class="left-section">
                    <h6><b>Dream for it, Work for it..</b></h6>
                </div>
                <div class="right-section">
                    <ul>
                        <li><a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="https://www.youtube.com" target="_blank"><i class="fab fa-youtube"></i></a></li>
                        <li><a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <hr class="text-gray-700">

    <section class="second-nav">
        <div class="container">
            <div class="logo">
                <img src="Images/paarsg logo.jpg" alt="Logo"> 
            </div>
            
            <div class="ai-buttons d-flex align-items-center">
                <button class="btn btn-ai">AI</button>
              
                <button class="btn-consultation">Free Consultation</button>

                <div class="ai-dropdown dropdown">
                    <button class="btn btn-secondary" type="button" id="aiDropdownToggle">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <ul class="dropdown-menu" id="aiDropdownMenu">
                      <li><a class="dropdown-item" href="indexpage.php">Home</a></li>
                        <li><a class="dropdown-item" href="vision.php">Vision</a></li>
                        <li><a class="dropdown-item" href="about.php">About</a></li>
                        <li><a class="dropdown-item" href="team.php">Team</a></li>
                        <li><a class="dropdown-item" href="blog2.php">Blog</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <hr class="text-gray-700">

    <script>
        const aiDropdownToggle = document.getElementById('aiDropdownToggle');
        const aiDropdownMenu = document.getElementById('aiDropdownMenu');

        aiDropdownToggle.addEventListener('click', function () {
            aiDropdownMenu.classList.toggle('show'); 
        });

        window.addEventListener('click', function (e) {
            if (!aiDropdownToggle.contains(e.target) && !aiDropdownMenu.contains(e.target)) {
                aiDropdownMenu.classList.remove('show'); 
            }
        });
    </script>
<div id="consultationPopup" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">Free Consultation</h3>
            <span class="close-button">&times;</span>
        </div>
        <div class="modal-body">
            <div class="card">
                <i class="fa fa-home"></i>
                <p>Buy Plot</p>
            </div>
            <div class="card">
                <i class="fa fa-compass"></i>
                <p>Vastu Shastra</p>
            </div>
            <div class="card">
                <i class="fa fa-quote-right"></i>
                <p>Quotation</p>
            </div>
        </div>
        <div class="modal-footer">
            <button class="close">Close</button>
        </div>
    </div>
</div>

<script>
    const modal = document.getElementById('consultationPopup');
    const btn = document.querySelector('.btn-consultation');
    const closeSpan = document.querySelector('.close-button');
    const closeButton = document.querySelector('.modal-footer .close');

    btn.onclick = function() {
        modal.style.display = 'block';
    }

    closeSpan.onclick = function() {
        modal.style.display = 'none';
    }

    
    closeButton.onclick = function() {
        modal.style.display = 'none';
    }

    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    }

    const cards = document.querySelectorAll('.modal-body .card');

    cards.forEach(card => {
        card.addEventListener('click', function() {
            cards.forEach(c => {
                c.style.backgroundColor = 'white'; 
                c.style.border = '2px solid #ccc'; 
            });

           
            this.style.backgroundColor = '#87CEEB'; 
            this.style.border = '2px solid green'; 
        });
    });
</script>


<!-- Carousel Section -->
  <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <!-- First slide -->
      <div class="carousel-item active">
        <div class="card-wrapper container">
          <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
              <div class="card" style="width: 100%;">
                <img src="images/services.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title text-center">Architect</h5>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
              <div class="card" style="width: 100%;">
                <img src="images/services.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title text-center">Interior Designer</h5>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
              <div class="card" style="width: 100%;">
                <img src="images/services.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title text-center">Landscape</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Second slide -->
      <div class="carousel-item">
        <div class="card-wrapper container">
          <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
              <div class="card" style="width: 100%;">
                <img src="images/services.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title text-center">Architect</h5>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
              <div class="card" style="width: 100%;">
                <img src="images/services.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title text-center">Interior Designer</h5>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
              <div class="card" style="width: 100%;">
                <img src="images/services.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title text-center">Landscape</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Third slide -->
      <div class="carousel-item">
        <div class="card-wrapper container">
          <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
              <div class="card" style="width: 100%;">
                <img src="images/services.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title text-center">Architect</h5>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
              <div class="card" style="width: 100%;">
                <img src="images/services.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title text-center">Interior Designer</h5>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
              <div class="card" style="width: 100%;">
                <img src="images/services.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title text-center">Landscape</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Carousel Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<!-- ----------------------------------------------------------------------------------------------------------------------- -->


<!-- Second Carousel (Dynamic from Database) -->

<section class="py-12 bg-blue-100">
<div class="container mx-auto text-center">
      <h1 class="text-4xl font-bold mb-6">OUR PROJECT</h1>

        <div id="customCarouselControlsDb" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php 
                $isFirst = true; // Check for first item
                $counter = 0; // Counter for card display

                echo '<div class="carousel-item ' . ($isFirst ? 'active' : '') . '"><div class="row">';
                
                while ($row = $results->fetch_assoc()) {
                    if ($counter > 0 && $counter % 3 == 0) {
                        echo '</div></div>'; 
                        echo '<div class="carousel-item"><div class="row">'; 
                    }
                    ?>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="<?php echo $row['image_path']; ?>" class="card-img-top" alt="<?php echo $row['image_name']; ?>" loading="lazy">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['image_name']; ?></h5>
                                <p class="card-text"><?php echo $row['category_name']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php 
                    $counter++;
                    $isFirst = false; // After first card, mark as false
                }
                echo '</div></div>'; 
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-target="#customCarouselControlsDb" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#customCarouselControlsDb" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


 <section class="py-12 bg-gray-100">
    <div class="container mx-auto text-center">
      <h1 class="text-4xl font-bold mb-6"><a href="services.php">OUR SERVICES</a></h1>
      <p class="text-lg mb-10">
        We offer a wide range of services to meet your needs, including interior design, architecture, and project management. 
        Our team of experts is here to help you create the space of your dreams.
      </p>

      <div class="grid grid-cols-4 gap-6  ">
        <div>
          <img class="w-full h-48 object-cover rounded " src="Images/plot.jpg" alt="Service 1">
        </div>
        <div>
          <img class="w-full h-48 object-cover rounded" src="Images/buildingpermission.jpg" alt="Service 2">
        </div>
        <div>
          <img class="w-full h-48 object-cover rounded" src="Images/exacavation.jpg" alt="Service 3">
        </div>
        <div>
          <img class="w-full h-48 object-cover rounded" src="Images/RCC-Work.jpg" alt="Service 4">
        </div>

        <div>
          <img class="w-full h-48 object-cover rounded" src="Images/buildingwork.jpg" alt="Service 5">
        </div>
        <div class="col-span-2">
          <img class="w-full h-48 object-cover rounded" src="Images/plaster1.jpg" alt="Service 6">
        </div>
        <div class="row-span-2">
          <img class="w-full h-full object-cover rounded" src="Images/arch1.jpg" alt="Service 7">
        </div>

        <div>
          <img class="w-full h-48 object-cover rounded" src="Images/bedroom-3051846_1280.jpg" alt="Service 8">
        </div>
        <div>
          <img class="w-full h-48 object-cover rounded" src="Images/kichen.jpg" alt="Service 9">
        </div>
        <div>
          <img class="w-full h-48 object-cover rounded" src="Images/ContemparyInterior.jpg" alt="Service 10">
        </div>
      </div>
    </div>
  </section>


<section class="how-it-works py-10 bg-blue-100">
    <h1 class="text-4xl font-bold mb-6 text-center">How it work</h1>
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 px-4 mb-8">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold mb-2">1. Consultation</h3>
                    <p>We begin with a detailed consultation to understand your vision and requirements.</p>
                </div>
            </div>
            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 px-4 mb-8">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold mb-2">2. Design</h3>
                    <p>Our team creates a customized design plan that aligns with your goals and budget.</p>
                </div>
            </div>
           
             <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 px-4 mb-8">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold mb-2">3. Development</h3>
                    <p>Our team creates a customized design plan that aligns with your goals and budget.</p>
                </div>
            </div>
            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 px-4 mb-8">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold mb-2">4. Completion</h3>
                    <p>We ensure every detail is perfect, delivering a space that exceeds your expectations.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" style="background-image: url('images/services.jpg');">
      <div class="carousel-caption d-flex flex-column align-items-center">
        <div class="testimonial-info text-center">
          <img src="https://via.placeholder.com/100" alt="person image">
          <h5>XYZ</h5>
          <p>Designer</p>
        </div>
        <div class="testimonial-text">
          <p class=" text-center text-lg text-gray-200 px-4"><i> <i class="fa-solid fa-quote-left"></i>
          Working with this interior designer was a fantastic experience. They transformed my home into a beautiful and functional space. I highly recommend their services!
          <i class="fa-sharp fa-solid fa-quote-right"></i></i></p>
        </div>
      </div>
    </div>

    <div class="carousel-item" style="background-image: url('images/services.jpg');">
      <div class="carousel-caption d-flex flex-column align-items-center">
        <div class="testimonial-info text-center">
          <img src="https://via.placeholder.com/100" alt="person image">
          <h5>ABC</h5>
          <p>Architect</p>
        </div>
        <div class="testimonial-text">
           <p class=" text-center text-lg text-gray-200 px-4"><i> <i class="fa-solid fa-quote-left"></i>
          Working with this interior designer was a fantastic experience. They transformed my home into a beautiful and functional space. I highly recommend their services!
          <i class="fa-sharp fa-solid fa-quote-right"></i></i></p>
        </div>
      </div>
    </div>

    <div class="carousel-item" style="background-image: url('images/services.jpg');">
      <div class="carousel-caption d-flex flex-column align-items-center">
        <div class="testimonial-info text-center">
          <img src="https://via.placeholder.com/100" alt="person image">
          <h5>DEF</h5>
          <p>Project Manager</p>
        </div>
        <div class="testimonial-text">
           <p class=" text-center text-lg text-gray-200 px-4"><i> <i class="fa-solid fa-quote-left"></i>
          Working with this interior designer was a fantastic experience. They transformed my home into a beautiful and functional space. I highly recommend their services!
          <i class="fa-sharp fa-solid fa-quote-right"></i></i></p>
        </div>
      </div>
    </div>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>


<footer class="bg-gray-800 text-white py-10">
  <div class="container mx-auto px-4 md:px-8 grid grid-cols-1 md:grid-cols-4 gap-8">
    <div class="flex flex-col items-center">
      <img src="Images/paarsg logo.jpg" alt="Paarsh Logo" class="w-32 mb-4">
      <p class="text-sm text-center mb-4">
        Education is the door for the future & Paarsh E-Learning is the key to brightening your future.
      </p>
      <div class="flex space-x-4 mt-4 justify-center">
        <a href="#"><i class="fa-brands fa-facebook-square text-2xl"></i></a>
        <a href="#"><i class="fa-brands fa-twitter-square text-2xl"></i></a>
        <a href="#"><i class="fa-brands fa-instagram-square text-2xl"></i></a>
        <a href="#"><i class="fa-brands fa-linkedin text-2xl"></i></a>
        <a href="#"><i class="fa-brands fa-youtube-square text-2xl"></i></a>
      </div>
    </div>

      <!-- Column 2: Quick Links -->
    <div class="flex flex-col items-center md:items-start">
      <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
      <ul class="space-y-2">
        <li><a href="indexpage.php" class="hover:underline">Home</a></li>
        <li><a href="services.php" class="hover:underline">Services</a></li>
        <li><a href="about.php" class="hover:underline">About</a></li>
        <li><a href="blog2.php" class="hover:underline">Blog</a></li>
      </ul>
    </div>

    <div class="flex flex-col items-center md:items-start">
      <button class="text-white bg-gray-700 p-3 rounded-lg" id="menuButton">
        <i class="fa-solid fa-bars"></i> Menu
      </button>
      <div id="dropdownMenu" class="hidden bg-gray-700 mt-4 p-4 rounded-lg space-y-2">
        <a href="indexpage.php" class="block hover:bg-gray-600 p-2 rounded">Home</a>
        
        <a href="vision.php" class="block hover:bg-gray-600 p-2 rounded">Vision</a>
        <a href="team.php" class="block hover:bg-gray-600 p-2 rounded">Team</a>
        <a href="about.php" class="block hover:bg-gray-600 p-2 rounded">About</a>
        <a href="blog2.php" class="block hover:bg-gray-600 p-2 rounded">Blog</a>
      </div>
    </div>

    <div class="flex flex-col items-center md:items-start">
      <h3 class="text-lg font-semibold mb-4">Contact</h3>
      <ul class="space-y-2">
        <li><i class="fa-solid fa-phone"></i> +919075201035</li>
        <li><i class="fa-solid fa-phone"></i> +919860098343</li>
        <li><i class="fa-solid fa-clock"></i> (10:00AM-6:00PM)</li>
        <li><i class="fa-solid fa-envelope"></i> info@paarshelearning.com</li>
      </ul>
    </div>
  </div>
</footer>

<section class="bg-gray-900 text-white py-4">
  <div class="container mx-auto px-4 md:px-8 flex flex-col md:flex-row justify-between items-center">
    <p class="text-sm text-center md:text-left mb-4 md:mb-0">
      Copyrights © 2023 Paarsh E-Learning. All rights reserved.
    </p>
   
    <div class="space-x-4 flex justify-center md:justify-end">
      <a href="#" class="hover:underline">Terms & Conditions</a>
      <a href="#" class="hover:underline">Privacy Policy</a>
    </div>
  </div>
</section>



  
<script>
  const menuButton = document.getElementById('menuButton');
  const dropdownMenu = document.getElementById('dropdownMenu');

  menuButton.addEventListener('click', () => {
    dropdownMenu.classList.toggle('hidden');
  });
</script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-NyQxj1gSh7EP5eLqzIvR+T1DrXrWavJVXNMyCf2SxrJe58G1IvkTOEaLHgUvHyDU" crossorigin="anonymous"></script> 
</body>
</html>
