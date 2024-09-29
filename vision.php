<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about page final</title>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style type="text/css">
        /* Typography */
@import url('https://fonts.googleapis.com/css2?family=Lora&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Lora&family=Ubuntu:wght@300;400;700&display=swap');
body {
    margin: 0;
    font-family: 'Lora', sans-serif;
   
}

        /*  styles for the social nav */
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

        /* Responsive Styles */
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

        /*  Second Navbar */
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

        /* rs  Second Navbar */
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

       /* Modal Styles */
                /* Modal Styles */
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

        /* Responsive Styles for Modal */
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

        /* Card Styles */
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
  
    <!-- Social Navbar -->
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

    <!-- Second Navbar Start -->
    <section class="second-nav">
        <div class="container">
            <div class="logo">
                <img src="Images/paarsg logo.jpg" alt="Logo"> 
            </div>
            
            <div class="ai-buttons d-flex align-items-center">
                <button class="btn btn-ai">AI</button>
                <button class="btn btn-consultation">Free Consultation</button>
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

    <!-- Free Consultation Popup -->
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

<!-- JavaScript -->
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
            // Reset all cards to default styles
            cards.forEach(c => {
                c.style.backgroundColor = 'white'; // Reset background to white
                c.style.border = '2px solid #ccc'; // Reset border
            });

            // Change the clicked card's background to sky blue and border to green
            this.style.backgroundColor = '#87CEEB'; // Sky blue background
            this.style.border = '2px solid green'; // Green border
        });
    });
</script>

    <!-- Vision & Mission Section -->
<section class="bg-black py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-white text-3xl font-bold mb-8">Our Vision & Mission</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Vision Card -->
            <div class="bg-gray-800 text-white p-6 rounded-lg">
                <h2 class="text-2xl font-semibold mb-4">Our Vision</h2>
                <p class="text-lg">100 % Client Satisfaction through Talented & Motivated Employee Engagement.</p>
            </div>
            <!-- Mission Card -->
            <div class="bg-gray-800 text-white p-6 rounded-lg">
                <h2 class="text-2xl font-semibold mb-4">Our Mission</h2>
                <p class="text-lg">To be a world-class software development enterprise by providing high quality, customizable on-time &amp; on-budget software solutions.</p>
            </div>
        </div>
    </div>
</section>
<!-- Vision & Mission Section End -->



        <!-- JavaScript for Dropdown -->
    <script>
        const aiDropdownToggle = document.getElementById('aiDropdownToggle');
        const aiDropdownMenu = document.getElementById('aiDropdownMenu');

        // Toggle dropdown visibility when button is clicked
        aiDropdownToggle.addEventListener('click', function () {
            aiDropdownMenu.classList.toggle('show'); // Add or remove 'show' class
        });

        // Close dropdown if clicked outside
        window.addEventListener('click', function (e) {
            if (!aiDropdownToggle.contains(e.target) && !aiDropdownMenu.contains(e.target)) {
                aiDropdownMenu.classList.remove('show'); // Remove 'show' class if clicked outside
            }
        });
    </script>



  <!-- footer -->
<footer class="bg-gray-800 text-white py-10">
  <div class="container mx-auto px-4 md:px-8 grid grid-cols-1 md:grid-cols-4 gap-6">
    <!-- Column 1: Logo and description -->
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

    <!-- Column 3: Hamburger Menu -->
    <div class="flex flex-col items-center md:items-start">
      <button class="text-white bg-gray-700 p-3 rounded-lg" id="menuButton">
        <i class="fa-solid fa-bars"></i> Menu
      </button>
      <div id="dropdownMenu" class="hidden bg-gray-700 mt-4 p-4 rounded-lg space-y-2">
        <a href="#" class="block hover:bg-gray-600 p-2 rounded">Vision</a>
        <a href="#" class="block hover:bg-gray-600 p-2 rounded">Design</a>
        <a href="#" class="block hover:bg-gray-600 p-2 rounded">About</a>
        <a href="#" class="block hover:bg-gray-600 p-2 rounded">Blog</a>
      </div>
    </div>

    <!-- Column 4: Contact Info -->
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

<!-- Section for copyright and policies -->
<section class="bg-gray-900 text-white py-4">
  <div class="container mx-auto px-4 md:px-8 flex flex-col md:flex-row justify-between items-center">
    <!-- Left side: Copyright text -->
    <p class="text-sm text-center md:text-left mb-4 md:mb-0">
      Copyrights © 2023 Paarsh E-Learning. All rights reserved.
    </p>
   
    <!-- Right side: Terms and Privacy links -->
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


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-NyQxj1gSh7EP5eLqzIvR+T1DrXrWavJVXNMyCf2SxrJe58G1IvkTOEaLHgUvHyDU" crossorigin="anonymous"></script> 
<!-- JavaScript for Dropdown -->
    <script>
        const aiDropdownToggle = document.getElementById('aiDropdownToggle');
        const aiDropdownMenu = document.getElementById('aiDropdownMenu');

        // Toggle dropdown visibility when button is clicked
        aiDropdownToggle.addEventListener('click', function () {
            aiDropdownMenu.classList.toggle('show'); // Add or remove 'show' class
        });

        // Close dropdown if clicked outside
        window.addEventListener('click', function (e) {
            if (!aiDropdownToggle.contains(e.target) && !aiDropdownMenu.contains(e.target)) {
                aiDropdownMenu.classList.remove('show'); // Remove 'show' class if clicked outside
            }
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-NyQxj1gSh7EP5eLqzIvR+T1DrXrWavJVXNMyCf2SxrJe58G1IvkTOEaLHgUvHyDU" crossorigin="anonymous"></script> 
</body>
</html>
