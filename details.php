<?php
include 'DBconnection.php';

$watch_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM watches WHERE id = $watch_id";
$result = $conn->query($sql);
$watch = $result->fetch_assoc();
?>
<style>
    body{
        background-image: url('images/luxury3.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    width: 97%;
    height: 100vh;
   margin-top: -50vh;
    }
    .watch{
        margin-top:30%;
        width:30%;
        height: 85%;
       border:2px solid white;
       border-radius:7px;
       color:black;

    }
  .watch  img{
        
        width: 100%;
        height: 50%;
        z-index: 1000;
    }
    span{
        color:white;
        font-weight:bolder;
        font-style:italic;
        font-size:22px;
    }
 .watch   button{
   margin-left:35%;
   border:2px solid white;
   border-radius:5px;



    }
    .watch   button:hover{
background: #00aaff;;
    }
    a{
        text-decoration:none;
        font-size:25px;
        border:2px solid white;
        border-radius:5px;
        color:black;
        background:white;
        margin:25%;
        background: #00aaff;
    }
   
    </style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $watch['name']; ?> - Details</title>
</head>
<body>
<?php if ($watch): ?>
    <div class="watch">
    <img src="<?php echo $watch['image']; ?>" alt="<?php echo htmlspecialchars($watch['name']); ?>">
    <h1><?php echo $watch['name']; ?></h1>
    <p><span> Brand:</span> <?php echo htmlspecialchars( $watch['brand']); ?></p>
    <p><span> Description:</span> <?php echo htmlspecialchars( $watch['description']); ?></p>
    <p><span> Price:</span> $<?php echo $watch['price']; ?></p>
   
    <?php else: ?>
    <p>No student found withthis id.</p>
<?php endif; ?>
    <a href="Sewatch.php">Back to Collection</a>
    </div>
</body>
</html>
