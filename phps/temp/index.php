<?php include('db_connect.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Vehicle List</title>
  <link rel="stylesheet" href="styles/homestyles.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
  <h1 class="text-3xl font-bold text-center mt-8">Vehicle List</h1>
  <div class="max-w-4xl mx-auto mt-8 space-y-4">
    <?php
      $result = $conn->query("SELECT * FROM vehicle");
      while($row = $result->fetch_assoc()) {
        echo "<div class='p-4 border border-amber-400 rounded'>
                <h2 class='text-xl font-semibold'>{$row['name']}</h2>
                <p>{$row['description']} - {$row['fee']}</p>
                <a href='vehicle.php?id={$row['id']}' class='text-amber-400 underline'>View Details</a>
              </div>";
      }
    ?>
  </div>
</body>
</html>
