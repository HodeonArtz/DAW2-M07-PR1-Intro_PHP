<?php 
  session_start();

  if(!isset($_SESSION["items"])){
    $_SESSION["items"] = [];
  }
?>
<?php 
$error_msg = '';
$success_msg = '';
  function create_item(string $name, int $quantity, int $price): array {
    return [
      "name" => $name,
      "quantity"=> $quantity,
      "price"=> $price,
      "cost" => $price*$quantity
    ];
  }
  function check_item(array $item):bool{
    return array_search($item,$_SESSION["items"]) !== false;
  }
  function to_string_all_item_properties(array $item) : string{
    return implode("",
    array_map(fn($property)=> 
    "<td>$property</td>",
    $item)
  );
  }
  function show_all_items():void{
    if(!isset($_SESSION["items"]))
    return;
    echo implode("",
      array_map(fn($item)=> "<tr>". 
      to_string_all_item_properties($item) . 
      "<td><input type='hidden' name='position' value='". array_search($item, $_SESSION["items"]) . "'>
            <input type='submit' name='action' value='Edit'>
            <input type='submit' name='action' value='Delete'></td></tr>",
            $_SESSION["items"])
    );
  }
  // --------------------------------------------------
  function add_item(): void {
    $item = create_item($_POST["product_name"], $_POST["quantity"], $_POST["price"]);
    if(!check_item($item)){
      array_push(
        $_SESSION["items"],
        $item
      );
      $GLOBALS["success_msg"] = "Item added properly.";
      return;
    }
    $GLOBALS["error_msg"] = "This item already exists.";
  }
  function reset_list():void{
    unset($_SESSION["items"]);
  }
?>
<?php
  if(isset($_POST["submit"])){
    switch ($_POST["submit"]) {
      case 'Add':
        add_item();
        break;
      case 'Reset':
        reset_list();
        break;
    }
  }
?>
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

  .error-msg {
    color: red;
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
  <form action="" method="post" id="main">
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
  </form>
  <p class="success-msg"><?php echo $success_msg ?></p>
  <p class="error-msg"><?php echo $error_msg ?></p>
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
    <tbody>
      <?php show_all_items() ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="3" class="total-cell">Total:</td>
        <td>0</td>
        <td>
          <input type="submit" value="Calculate total" name="submit" form="main">
        </td>
      </tr>
    </tfoot>
  </table>
</body>

</html>