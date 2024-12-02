<?php
include 'DBconnection.php';

// Get the watch ID from the GET request
$watch_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Initialize messages
$success_message = $error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $brand = $_POST["brand"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $image = $_POST["image"];

    // Update the watch details
    $sql = "UPDATE watches SET name=?, brand=?, description=?, price=?, image=? WHERE ID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssi', $name, $brand, $description, $price, $image, $watch_id);

    if ($stmt->execute()) {
        $success_message = "Watch record updated successfully!";
    } else {
        $error_message = "Error updating record: " . $stmt->error;
    }

    $stmt->close();
} else {
    // Fetch watch details for the provided ID
    $sql = "SELECT * FROM watches WHERE ID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $watch_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a watch was found
    if ($result->num_rows > 0) {
        $watch = $result->fetch_assoc();

        // Pre-fill the form with the current watch details
        $name = $watch["name"];
        $brand = $watch["brand"];
        $description = $watch["description"];
        $price = $watch["price"];
        $image = $watch["image"];
    } else {
        $error_message = "Watch not found!";
        $name = $brand = $description = $price = $image = "";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Watch</title>
    <style>
        body {
            background-image: url('images/luxury2.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    width: 97%;
    height: 100vh;
  

        }
        .container {
            border:2px solid #585c5e;
            margin-right:50%;
            max-width: 520px;
            height: 91vh;
           
           
            padding: 20px;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .container h2 {
            margin-left:33%;
            width: 27%;
            border:2px solid  #00aaff;
            text-align: center;
            margin-bottom: 20px;
            background: #00aaff;
        }
        form {
            margin-bottom: 12px;
            padding:3px;
           
        }
        form label {

            display: block;
            margin: 5px;
            margin-top:10px;
            font-weight: bold;
        }
        form input,  textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1em;
        }
        form textarea {
            width:100%;
        }
        form button {
            margin-top:20px;
            width: 100%;
            padding: 10px;
            font-size: 1em;
            background-color:  #00aaff;;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        form button:hover {
            background-color: #585c5e;
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

<div class="container">
    <h2>Edit Watch</h2>

    <?php if ($success_message): ?>
        <p class="message"><?php echo $success_message; ?></p>
    <?php elseif ($error_message): ?>
        <p class="message-error"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>

        <label for="brand">Brand:</label>
        <input type="text" id="brand" name="brand" value="<?php echo htmlspecialchars($brand); ?>" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required><?php echo htmlspecialchars($description); ?></textarea>

        <label for="price">Price:</label>
        <input type="text" id="price" name="price" value="<?php echo htmlspecialchars($price); ?>" required>

        <label for="image">Image URL:</label>
        <input type="text" id="image" name="image" value="<?php echo htmlspecialchars($image); ?>" required>

        <button type="submit">Update Watch</button>
    </form>

    <a href="Sewatch.php" class="back-link">Back to Watch Records</a>
</div>

</body>
</html>
