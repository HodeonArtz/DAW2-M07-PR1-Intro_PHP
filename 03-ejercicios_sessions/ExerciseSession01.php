<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 1 sessions</title>
</head>

<w>
  <h1>Supermarket management</h1>
  <!-- ------------------------------------------------------------- -->
  <form action="" method="post">
    <label for="worker-input">Worker name: </label>
    <input type="text" name="worker-input" id="worker-input">
    <!-- ------------------------------------------------------------- -->

    <h2>Choose product:</h2>
    <select name="product" id="product">
      <option value="Soft Drink">Soft Drink</option>
      <option value="Milk">Milk</option>
    </select>
    <!-- ------------------------------------------------------------- -->

    <h2>Product quantity:</h2>
    <input type="number" name="product-quantity" id="product-quantity" min="1"><br>
    <input type="submit" value="add" name="submit">
    <input type="submit" value="remove" name="submit">
    <input type="reset" value="reset">
    <!-- ------------------------------------------------------------- -->
    <h2>Inventary</h2>
    <p>worker: </p>
    <p>units milk: </p>
    <p>units soft drink: </p>
  </form>
</w>

</html>