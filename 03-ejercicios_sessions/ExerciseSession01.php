<?php 
  session_start();
  /* Esta variable será la que permitirá mostrar los datos por pantalla */
  $inventory_data = [
    "worker" => "Nobody",
    "units_milk" => 0,
    "units_soft_drink" => 0,
  ];
  $error_inventario = false;
  /* --------------- */
  if(!isset($_SESSION["worker"])){
    $_SESSION["worker"] = $inventory_data["worker"];
    $_SESSION["units_milk"] = $inventory_data["units_milk"];
    $_SESSION["units_soft_drink"] = $inventory_data["units_soft_drink"];
  }
  /* --------------- */
  if(isset($_POST["submit"])){
    $error_inventario = false;
    switch ($_POST["submit"]) {
      case 'add':
        $_SESSION["units_{$_POST['product']}"] 
          += $_POST["product-quantity"];
        break;
      case "remove":
        $error_inventario = $_POST["product-quantity"] > $_SESSION["units_{$_POST['product']}"];
        if(!$error_inventario)
          $_SESSION["units_{$_POST['product']}"] 
          -= $_POST["product-quantity"];
    }
    if(!$error_inventario){
      $_SESSION["worker"] = $_POST["worker-input"];
    }
  }

  /* --------------- */
  if(isset($_SESSION["worker"])){
    $inventory_data = [
      "worker" => $_SESSION["worker"],
      "units_milk" => $_SESSION["units_milk"],
      "units_soft_drink" => $_SESSION["units_soft_drink"]
    ];
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 1 sessions</title>
</head>

<body>
  <h1>Supermarket management</h1>
  <form action="./ExerciseSession01.php" method="post">
    <!-- ------------------------------------------------------------- -->
    <label for="worker-input">Worker name: </label>
    <input type="text" name="worker-input" id="worker-input" value="<?php echo $inventory_data["worker"] ?>">
    <!-- ------------------------------------------------------------- -->

    <h2>Choose product:</h2>
    <select name="product" id="product">
      <option value="soft_drink">Soft Drink</option>
      <option value="milk">Milk</option>
    </select>
    <!-- ------------------------------------------------------------- -->

    <h2>Product quantity:</h2>
    <input type="number" name="product-quantity" id="product-quantity" min="1" value="1"><br>
    <?php if($error_inventario){ ?>
    <h3 style="color: red;">You can't remove more products than they are.</h3>
    <?php } ?>

    <input type="submit" value="add" name="submit">
    <input type="submit" value="remove" name="submit">
    <input type="submit" value="reset" name="submit">
    <!-- ------------------------------------------------------------- -->
    <h2>Inventary</h2>
    <p>worker: <?php echo $inventory_data["worker"] ?></p>
    <p>units milk: <?php echo $inventory_data["units_milk"] ?></p>
    <p>units soft drink: <?php echo $inventory_data["units_soft_drink"] ?></p>
    <!-- ------------------------------------------------------------- -->
  </form>
</body>

</html>