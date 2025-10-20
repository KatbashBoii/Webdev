<?php include('db_connect.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Vehicle Details</title>
  <link rel="stylesheet" href="styles/homestyles.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
  <?php
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM vehicles WHERE id=$id");
    $vehicle = $result->fetch_assoc();

    if ($vehicle) {
      echo "<div class='max-w-2xl mx-auto mt-16 text-center'>
              <h1 class='text-4xl font-bold text-amber-400 mb-4'>{$vehicle['name']}</h1>
              <p class='text-lg mb-2'>Year: {$vehicle['year']}</p>
              <p class='text-lg mb-2'>Price: {$vehicle['price']}</p>
              <p class='text-sm text-gray-400 mt-4'>{$vehicle['description']}</p>
            </div>";
    } else {
      echo "<p class='text-center mt-16 text-red-400'>Vehicle not found.</p>";
    }
  ?>
</body>
</html>
