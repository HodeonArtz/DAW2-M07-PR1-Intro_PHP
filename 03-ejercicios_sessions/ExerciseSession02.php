<?php 
session_start();
   if(isset($_POST["submit"])){
    switch ($_POST["submit"]) {
      case 'Modify':
        $_SESSION["arr_nums"][(int)$_POST["position"]] = $_POST["new_value"];
        break;
      case 'Reset':
        unset($_SESSION["arr_nums"]);
        break;
    }
  } 
  if(!isset($_SESSION["arr_nums"])){
    $_SESSION["arr_nums"] = [10,20,30];
  } 
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
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
    </select>
    <br>
    <br>
    <label for="new_value">New value:</label>
    <input type="number" name="new_value" id="new_value" value="0">
    <br>
    <br>
    <input type="submit" name="submit" value="Modify">
    <input type="submit" name="submit" value="Average">
    <input type="submit" name="submit" value="Reset">
  </form>
  <!-- current array -->
  <p>
    Current array: <?php echo implode(", ", $_SESSION["arr_nums"]); ?>
  </p>
  <!-- average -->
  <p>
    <?php 
      if(isset($_POST["submit"]) && $_POST["submit"]=="Average"){
        echo array_reduce($_SESSION["arr_nums"], fn($acc, $num) => $acc + $num)/3;
      }
    ?>
  </p>
</body>

</html>