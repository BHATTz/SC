<?php
session_start();

// Create an array of values [1-10]
$values = range(1, 10);

// Determine the index to start from, based on session storage
$start_index = isset($_SESSION['start_index']) ? $_SESSION['start_index'] : 0;

// Initialize an array to hold the values to display
$values_to_display = [];

// Get the next 3 values from the array, wrapping around if necessary
for ($i = 0; $i < 3; $i++) {
  $values_to_display[] = $values[($start_index + $i) % count($values)];
}

// Calculate the next start index
$next_start_index = ($start_index + 3) % count($values);

// Store the next start index in the session
$_SESSION['start_index'] = $next_start_index;
?>

<!DOCTYPE html>
<html>

<head>
  <title>Display Values</title>
</head>

<body>
  <h1>Values to Display</h1>
  <ul>
    <?php foreach ($values_to_display as $value) : ?>
      <li><?php echo $value; ?></li>
    <?php endforeach; ?>
  </ul>
</body>

</html>