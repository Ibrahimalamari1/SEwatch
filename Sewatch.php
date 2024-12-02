<?php include 'DBconnection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SE watch</title>
    <link rel="stylesheet" href="sewatch.css">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
    
    <header class="main-header">
        <div class="top-bar">
            <div class="social-icons">
                <a href="#"><i class="fab fa-whatsapp"></i></a>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
            <div class="register">
                <a href="#">Login / Register</a>
            </div>
        </div>
        <div class="header-content">
            <div class="logo">
                <a href="#">
                    <span class="SE">SE</span>
                    <span class="store">STORE</span>
                </a>
            </div>
            <nav class="nav1">
                <ul>
                    <li><a id="home" href="Sewatch.php">HOME</a></li>
                    <li><a href="#footer">ABOUT</a></li>
                    <li><a href="#shopid">SHOP</a></li>
                    <li><a href="#footer">BLOG</a></li>
                    <li><a href="edit.php">Gallery</a></li>
                    <li><a href="#footer">CONTACT</a></li>
                    <li><a href="manage.php">Manage</a></li>
                </ul>
            </nav>
            <div class="search">
                <a href="#"><i class="fas fa-search"></i></a>
                
            </div>
        </div>
        
    </header>
    <div class="hero-section">
        <div class="text">
          <h1>Rolex</h1>
          <h3>Time Is A Luxury</h3>
          <h5>A Classic Collection Of 
            Luxurious Watches For <br>
            The Real Gentlemen
          </h5>
          <a href="">Welcome To SE Store</a>
       
        </div>
      </div>
    
    
    





    <main id="shopid">
        
   
    <?php
$sql = "SELECT * FROM watches";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $count = 1;
    while ($row = $result->fetch_assoc()) {
        if ($count == 1) {
            echo "<h1 class='firsth1'>Apple Watches</h1>";
        } 
        if ($count == 5) {
            echo "<h1>Samsung Watches</h1>";
        }
        if($count==9){
            echo "<h1>Women's Watches</h1>";
        }
        if($count==13){
            echo "<h1>Classic Watches</h1>";
        }


        echo "
        <div class='item'>
            <img id='image$count' src='" . $row['image'] . "' alt='" . $row['name'] . "'>
            <div id='details$count' class='details'>
                <div class='details-sub'>
                    <h5>" . $row['name'] . "</h5>
                    <h5 class='price'>$" . $row['price'] . "</h5>
                </div>
                <a href='details.php?id=" . $row['id'] . "'>View Details</a>
            </div>
        </div>";

        $count++; // Increment the counter
    }
} else {
    echo "<p>No watches available.</p>";
}
?>

        
          </main>
    
      


<footer id="footer" class="footer">
    <div class="detail">
       
        <div class="footer-section">
            <h2 class="footer-logo"><span class="SE">SE</span> <span class="store">Store</span> </h2>
            <p>Explore our collection of exclusive luxury timepieces.</p>
        </div>

        
        <div class="footer-section">
            <h3>Menu</h3>
            <ul>
                <li><a href="#">HOME</a></li>
                
                <li><a href="#">ABOUT</a></li>
                <li><a href="#">SHOP</a></li>
                <li><a href="#">BLOG</a></li>
                <li><a href="#">GALLERY</a></li>
                <li><a href="#">CONTACT</a></li>
            </ul>
        </div>

        

        
        <div class="footer-section">
            <h3>Contact Us</h3>
            <p><i class="fas fa-phone-alt"></i> +1 (123) 456-7890</p>
            <p><a href="mailto:support@gmail.com"><i class="fas fa-envelope"></i> support@luxwatches.com</a></p>
            <p><i class="fas fa-map-marker-alt"></i> 123 Elite Avenue, New York, NY</p>
        </div>
    </div>
    <div class="copyright">
        <p> <span class="SE"> SE</span> 
            <span class="store">Store </span> .
            &copy; 2024 All rights reserved.</p>
    </div>
</footer>
      </body>
      </html>
