<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Available Cars</title>
  <link href="https://cdn.tailwindcss.com" rel="stylesheet" />
</head>
<body class="bg-white">

<section id="cars" class="p-8">
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 mt-10 px-2">

    <?php
    $sql = "SELECT * FROM vehicles";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo '
        <div class="car-card rounded-2xl overflow-hidden border-yellow-400 flex flex-col">
          <div class="h-64 bg-gradient-to-br from-slate-800 via-slate-700 to-slate-900 flex items-center justify-center relative">
            <img src="' . $row["image_url"] . '" alt="' . htmlspecialchars($row["name"]) . '" class="absolute inset-0 w-full h-full object-cover z-0" />
            <div class="absolute top-4 left-4 bg-black/50 text-white px-3 py-1 rounded-full text-xs font-medium tracking-wide">'
              . htmlspecialchars($row["type"]) .
            '</div>
          </div>
          <div class="p-8 flex flex-col flex-1">
            <h3 class="luxury-font text-2xl font-semibold mb-3">' . htmlspecialchars($row["name"]) . '</h3>
            <p class="text-gray-600 mb-6 font-light">' . htmlspecialchars($row["description"]) . '</p>
            <div class="flex justify-between items-center mb-6 mt-auto">
              <div class="text-3xl font-bold luxury-text">Rs' . number_format($row["price"]) . '<span class="text-lg text-gray-500 font-normal">/day</span></div>
              <div class="flex items-center text-sm text-gray-500 space-x-4">
                <span class="flex items-center">Seats ' . htmlspecialchars($row["seats"]) . '</span>
                <span class="flex items-center">Cat: ' . htmlspecialchars($row["category"]) . '</span>
              </div>
            </div>
            <a href="vehicle.php?id=' . $row["id"] . '">
              <button class="w-full luxury-button text-white py-3 rounded-lg font-semibold tracking-wide uppercase bg-yellow-500 hover:bg-yellow-600 transition">
                Reserve Now
              </button>
            </a>
          </div>
        </div>
        ';
      }
    } else {
      echo "<p class='col-span-3 text-center text-gray-500'>No cars available.</p>";
    }

    $conn->close();
    ?>

  </div>
</section>

</body>
</html>
