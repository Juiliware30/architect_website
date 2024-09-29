<?php
// Include database connection
include 'db_config.php';

//  form submission 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //add
    if (isset($_POST['add'])) {
        // Add image logic
        $imageName = $_POST['image_name'];
        $categoryName = $_POST['category_name'];
        $imagePath = 'uploads/' . $_FILES['image']['name'];
        
        // Move uploaded file to the uploads directory
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
        
        $stmt = $conn->prepare("INSERT INTO carousel_images (image_path, image_name, category_name) VALUES (?, ?, ?)");
        //sss string types all variables
        $stmt->bind_param("sss", $imagePath, $imageName, $categoryName);
        $stmt->execute();
        $stmt->close();
    }
    //update
     elseif (isset($_POST['update'])) {
        // Update image logic
        $id = $_POST['id'];
        $imageName = $_POST['image_name'];
        $categoryName = $_POST['category_name'];
        
        // If a new image is uploaded
        if ($_FILES['image']['name']) {
            $imagePath = 'uploads/' . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
            $stmt = $conn->prepare("UPDATE carousel_images SET image_path = ?, image_name = ?, category_name = ? WHERE id = ?");
            $stmt->bind_param("sssi", $imagePath, $imageName, $categoryName, $id);
        } else {
            $stmt = $conn->prepare("UPDATE carousel_images SET image_name = ?, category_name = ? WHERE id = ?");
            $stmt->bind_param("ssi", $imageName, $categoryName, $id);
        }
        $stmt->execute();
        $stmt->close();
    }

    //delete
     elseif (isset($_POST['delete'])) {
        // Delete image 
        $id = $_POST['id'];
        $stmt = $conn->prepare("DELETE FROM carousel_images WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}

//  category filtering
$selectedCategory = isset($_POST['category_filter']) ? $_POST['category_filter'] : 'all';

// Fetch images for display based on the selected category
if ($selectedCategory !== 'all') {
    $stmt = $conn->prepare("SELECT * FROM carousel_images WHERE category_name = ? ORDER BY created_at ASC");
    $stmt->bind_param("s", $selectedCategory);
} else {
    $stmt = $conn->prepare("SELECT * FROM carousel_images");
}
$stmt->execute();
$results = $stmt->get_result();

// Fetch categories in dropdown
$categoryResults = $conn->query("SELECT DISTINCT category_name FROM carousel_images");
?>


<!-- admine panel structure -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">



    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lora&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Lora&family=Ubuntu:wght@300;400;700&display=swap');

        body {
        
            font-family: 'Lora', sans-serif;
       /*     height: 100vh;
            display: flex;
*/        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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

        /* Sticky Second Navbar */
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
            display: none; /* Initially hidden */
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

        /* Responsive Styles for Second Navbar */
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


        .container-flex {
            display: flex;
            height: 100vh; 
        }

        .sidebar {
            width: 20%;
            background-color: #f0f5f9;
            padding: 20px;
            height: 100%; 
            overflow-y: auto;
        }

        .main-content {
            width: 80%;
            padding: 20px;
            overflow-y: auto;
        }

         
        .sidebar-header h3 {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
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
                <img src="Images/paarsg logo.jpg" alt="Logo"> <!-- Replace 'logo.png' with the path to your logo -->
            </div>
            
            <div class="ai-buttons d-flex align-items-center">
                <div class="ai-dropdown dropdown">
                    <button class="btn btn-secondary" type="button" id="aiDropdownToggle">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <ul class="dropdown-menu" id="aiDropdownMenu">
                        <li><a class="dropdown-item" href="#">Vision</a></li>
                        <li><a class="dropdown-item" href="#">About</a></li>
                        <li><a class="dropdown-item" href="#">Design</a></li>
                        <li><a class="dropdown-item" href="#">Blog</a></li>
                    </ul>
                </div>
                <button class="btn btn-ai">AI</button>
                <button class="btn btn-consultation">Free Consultation</button>
                
            </div>
        </div>
    </section>
    <hr class="text-gray-700">

    <!-- JavaScript for Dropdown -->
    <script>
        const aiDropdownToggle = document.getElementById('aiDropdownToggle');
        const aiDropdownMenu = document.getElementById('aiDropdownMenu');

        // Toggle dropdown visibility when button is clicked
        aiDropdownToggle.addEventListener('click', function () {
            aiDropdownMenu.classList.toggle('show'); 
        });

        // Close dropdown if clicked outside
        window.addEventListener('click', function (e) {
            if (!aiDropdownToggle.contains(e.target) && !aiDropdownMenu.contains(e.target)) {
                aiDropdownMenu.classList.remove('show'); 
            }
        });
    </script>


    <hr class="text-gray-700">

    <div class="container-flex">
        <div class="sidebar">
            <div class="sidebar-header">
                <h3>Admin Panel</h3>
            </div>
            <div class="projects-section">
                <h4>Projects</h4>
                <form method="POST" id="filterForm">
                    <select name="category_filter" onchange="document.getElementById('filterForm').submit();" class="form-control">
                        <option value="all" <?php echo ($selectedCategory == 'all') ? 'selected' : ''; ?>>All</option>
                        <option value="completed" <?php echo ($selectedCategory == 'Completed') ? 'selected' : ''; ?>>Completed</option>
                        <option value="ongoing" <?php echo ($selectedCategory == 'Ongoing') ? 'selected' : ''; ?>>Ongoing</option>
                        <option value="upcoming" <?php echo ($selectedCategory == 'Upcoming') ? 'selected' : ''; ?>>Upcoming</option>
                    </select>
                    <button type="button" class="btn btn-secondary mt-2" onclick="showAll()">Show All</button>
                </form>
            </div>
        </div>

        <div class="main-content">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="text-3xl">Our Project</h1>
            </div>
            
            <h2 class="mb-4 d-flex justify-content-between align-items-center">
                Image List
                <button class="btn btn-primary" data-toggle="modal" data-target="#addImageModal">Add</button>
            </h2>

            <table class="table" id="imageTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $results->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><img src="<?php echo $row['image_path']; ?>" width="100" alt=""></td>
                            <td><?php echo $row['image_name']; ?></td>
                            <td><?php echo $row['category_name']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                            <td>
                                <button class="btn btn-warning" data-toggle="modal" data-target="#updateImageModal" 
                                        data-id="<?php echo $row['id']; ?>" 
                                        data-image_name="<?php echo $row['image_name']; ?>" 
                                        data-category_name="<?php echo $row['category_name']; ?>">
                                    Update
                                </button>
                                <form action="" method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php $conn->close(); ?>

    <!-- Add Image Modal -->
    <div class="modal fade" id="addImageModal" tabindex="-1" aria-labelledby="addImageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addImageModalLabel">Add Image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="file" name="image" required>
                        <input type="text" name="image_name" placeholder="Image Name" class="form-control" required>
                        <select name="category_name" class="form-control" required>
                            <option value="" disabled selected>Select Category</option>
                            <option value="Ongoing">Ongoing</option>
                            <option value="Upcoming">Upcoming</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="add" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

  <!-- Update Image  -->
<div class="modal fade" id="updateImageModal" tabindex="-1" aria-labelledby="updateImageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateImageModalLabel">Update Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="updateId">
                    <input type="file" name="image" id="updateImage">
                    <input type="text" name="image_name" id="updateImageName" class="form-control" required>
                    <select name="category_name" id="updateCategoryName" class="form-control" required>
                        <option value="" disabled selected>Select Category</option>
                        <option value="Ongoing">Ongoing</option>
                        <option value="Upcoming">Upcoming</option>
                        <option value="Completed">Completed</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
 $('#updateImageModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var imageName = button.data('image_name');
        var categoryName = button.data('category_name');

        var modal = $(this);
        modal.find('#updateId').val(id);
        modal.find('#updateImageName').val(imageName);
        modal.find('#updateCategoryName').val(categoryName);
    });

    function showAll() {
        document.querySelector('select[name="category_filter"]').value = 'all';
        document.getElementById('filterForm').submit();
    }
</script>




    <!-- footer -->
<footer class="bg-gray-800 text-white py-10">
  <div class="container mx-auto px-4 md:px-8 grid grid-cols-1 md:grid-cols-4 gap-8">
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
        <li><a href="#" class="hover:underline">Home</a></li>
        <li><a href="#" class="hover:underline">Vision</a></li>
        <li><a href="#" class="hover:underline">About</a></li>
        <li><a href="#" class="hover:underline">Blog</a></li>
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


</body>
</html>
