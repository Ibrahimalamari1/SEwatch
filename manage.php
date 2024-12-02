
<?php
include 'DBconnection.php';
?>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1{
            margin-top:20px;
            margin-left:37%;
            width: 24%;
            border:2px solid  #00aaff;
            text-align: center;
            margin-bottom: 20px;
            background: #00aaff;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th{
            
            color:#00aaff
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        a {
            text-decoration: none;
            color: #007BFF;
        }
        a:hover {
            text-decoration: underline;
        }
        .action a {
            margin-right: 10px;
        }
        .addnew{
            text-decoration:underline;
            font-size:20px;
        }
    </style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage</title>
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
                </ul>
            </nav>
            <div class="search">
                <a href="#"><i class="fas fa-search"></i></a>
                
            </div>
        </div>
        
    </header>
    <body>
    <h1>Watch List</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Brand</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php $sql = "SELECT id, brand, description, price,image FROM watches";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['brand']}</td>
                <td>{$row['description']}</td>
                <td>\${$row['price']}</td>
                <td>{$row['image']}</td>

                
                <td class='action'>
                    <a href='edit.php?id={$row['id']}'>Update</a>
                     </td>
                <td class='action'>
                    <a href='delete.php?id={$row['id']}' onclick=\"return confirm('Are you sure you want to delete this item?');\">Delete</a>
                    </td>
                <td class='action'>
                    <a href='details.php?id={$row['id']}'>Show</a>
                     </td>
                
              </tr>";
    }
} else {
    echo "<tr><td >No watches found.</td></tr>";
}



?> 
        </tbody>
    </table>
    <a class="addnew" href="add.php">Add new item</a>
    </body>
    </html>