<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 3 Sessions</title>
  <style>
  .success-msg {
    color: green;
  }

  table,
  th,
  td {
    border: solid 1px black;
    border-collapse: collapse;
  }

  td,
  th {
    padding: 0.4rem;
  }

  .total-cell {
    text-align: right;
  }
  </style>
</head>

<body>
  <h1>Shopping list</h1>
  <form action="" method="post">
    <p>
      <label for="product_name">name: </label>
      <input type="text" name="product_name" id="product_name"><br>
      <label for="quantity">quantity: </label>
      <input type="text" name="quantity" id="quantity"><br>
      <label for="price">price: </label>
      <input type="text" name="price" id="price"><br>
    </p>
    <input type="submit" value="Add" name="submit">
    <input type="submit" value="Update" name="submit">
    <input type="submit" value="Reset" name="submit"><br>
    <p class="success-msg">Item _ properly.</p>
    <table>
      <thead>
        <tr>
          <th>name</th>
          <th>quantity</th>
          <th>price</th>
          <th>cost</th>
          <th>actions</th>
        </tr>
      </thead>
      <tbody></tbody>
      <tfoot>
        <tr>
          <td colspan="3" class="total-cell">Total:</td>
          <td>0</td>
          <td><input type="submit" value="Calculate total" name="submit"></td>
        </tr>
      </tfoot>
    </table>
  </form>
</body>

</html>