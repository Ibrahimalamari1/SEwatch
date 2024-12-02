<?php
include 'DBconnection.php';
$name = $brand = $description = $price = $image = "";
$success_message = $error_message = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $brand = $_POST["brand"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $image = $_POST["image"];

    // Insert the record into the database
    $sql = "INSERT INTO watches (name, brand, description, price, image) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssss', $name, $brand, $description, $price, $image);

    if ($stmt->execute()) {
        $success_message = "New watch added successfully!";
        // Clear form data
        $name = $brand = $description = $price = $image = "";
    } else {
        $error_message = "Error: " . $stmt->error;
    }

    $stmt->close();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Watch</title>
    <style>
        body {
            background-image: url('luxury2.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    width: 97%;
    height: 100vh;
  

        }
        .form-container {
            border:2px solid #585c5e;
            margin-right:50%;
            max-width: 520px;
            height: 91vh;
           
           
            padding: 20px;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .form-container h2 {
            
            margin-left:33%;
            width: 35%;
            border:2px solid  #00aaff;
            text-align: center;
            margin-bottom: 20px;
            background: #00aaff;
        
        }
        .form-group {
            margin-bottom: 12px;
            padding:3px;
           
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1em;
        }
        .form-group textarea {
           
            width:100%;
        
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            font-size: 1em;
            background-color:   #00aaff;;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color:#585c5e;
        }
        .message {
            text-align: center;
            margin-top: 15px;
            font-size: 1.1em;
        }
        .success {
            color:  #585c5e;;
        }
        .error {
            color: red;
        }
        .back-link{
            border:2px solid black;
            text-decoration:none;
            color:white;
            background:#585c5e;
        }
        
        
    </style>
</head>
<body>

<div class="form-container">
    <h2>Add New Watch</h2>
    <form method="post" action="add.php">
        <div class="form-group">
            <label for="name">Watch Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
        </div>
        <div class="form-group">
            <label for="brand">Brand:</label>
            <input type="text" id="brand" name="brand" value="<?php echo htmlspecialchars($brand); ?>" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" required><?php echo htmlspecialchars($description); ?></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" id="price" name="price" value="<?php echo htmlspecialchars($price); ?>" required>
        </div>
        <div class="form-group">
            <label for="image">Image URL:</label>
            <input type="text" id="image" name="image" value="<?php echo htmlspecialchars($image); ?>" required>
        </div>
        
        <div class="form-group">
            <button type="submit">Add Watch</button>
        </div>
    </form>
    <a href="final.php" class="back-link">Back to Watch Records</a>

    <?php if ($success_message): ?>
        <div class="message success"><?php echo $success_message; ?></div>
    <?php endif; ?>

    <?php if ($error_message): ?>
        <div class="message error"><?php echo $error_message; ?></div>
    <?php endif; ?>
</div>

</body>
</html>
