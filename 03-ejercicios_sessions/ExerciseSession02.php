<?php 
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 2 sessions</title>
</head>

<body>
  <h1>
    Modify array saved in session
  </h1>
  <form action="./ExerciseSession02.php" method="post">
    <label for="position">Position to modify:</label>
    <select name="position" id="position">

    </select>
    <br>
    <label for="new_value">New value:</label>
    <input type="number" name="new_value" id="new_value">
    <br>
    <input type="submit" name="submit" value="Modify">
    <input type="submit" name="submit" value="Average">
    <input type="submit" name="submit" value="Reset">
  </form>
  <!-- current array -->
  <p></p>
</body>

</html>