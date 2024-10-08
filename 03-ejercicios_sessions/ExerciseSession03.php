<?php 
  session_start();

  /* 
    Aquí se inicia unos array items en el $_SESSION para guardar la lista de items
     en un array y para dejar el precio total en 0.
  */
  if(!isset($_SESSION["items"])){
    $_SESSION["items"] = [];
    $_SESSION["total_price"] = 0;
  }

  
?>
<?php 
/**
 * @var string
 * Esta variable sirve para indicar un mensaje de error que más tarde se utilizará en
 * la parte de HTML
 */
$error_msg = '';
/**
 * @var string
 * Esta variable sirve para indicar un mensaje de éxito que más tarde se utilizará en
 * la parte de HTML
 */
$success_msg = '';

  /**
   * Crea un array associativo con el nombre, la cantidad, y el precio de un ítem.
   * @param string $name Nombre del producto / ítem
   * @param int $quantity Cantidad de este producto.
   * @param int $price Cuánto cuesta el precio por unidad
   * @return array
   */
  function create_item(string $name, int $quantity, int $price): array {
    return [
      "name" => $name,
      "quantity"=> $quantity,
      "price"=> $price,
      "cost" => $price*$quantity
    ];
  }
$selected_item = [
  "name" => "",
  "quantity"=> "",
  "price"=> "",
];
  function check_if_item_repeats(array $item):bool{
    $product_name = $item["name"];
    $item_names = array_map(
      fn($it)=>$it["name"],
      $_SESSION["items"]
    );

    return array_search(
      needle: $product_name,
      haystack: $item_names)
       !== false;
  }
  function check_name_availability(string $name):bool{
    // true si es el nombre propio u otro nombre que no exista
    // false si el nombre no es propio y ya existe
    $old_name = $_SESSION["items"][$_SESSION["selected_item_pos"]]["name"];
    $item_names = 
      array_map(
        fn($item)=>$item["name"], 
        $_SESSION["items"]
      );
    return !in_array(
      $name, 
      array_filter(
        $item_names,fn($item) => $item != $old_name
      )
    );
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
      " <td>
          <form action='' method='POST'>
            <input type='hidden' name='position' value='". 
            array_search($item, $_SESSION["items"]) .
            "'>
            <input type='submit' name='action' value='Edit'>
            <input type='submit' name='action' value='Delete'>
            </form>
          </td>
      </tr>
      ",
            array: $_SESSION["items"])
    );
  }
  // --------------------------------------------------
  function add_item(): void {
    $item = create_item(
      name: $_POST["product_name"], 
      quantity: $_POST["quantity"], 
      price: $_POST["price"]
    );
    if(!check_if_item_repeats($item)){
      array_push($_SESSION["items"],$item);
      $GLOBALS["success_msg"] = "Item added properly.";
      return;
    }
    $GLOBALS["error_msg"] = "This item already exists.";
  }

  function update_item ():void{
    if(!isset($_SESSION["selected_item_pos"])){
      $GLOBALS["error_msg"] = "Select an item first! (click the 'edit' button)";
      return;
    }
    $item_update = create_item(
      $_POST["product_name"], 
      $_POST["quantity"], 
      $_POST["price"]
    );
    if(check_name_availability($item_update["name"])){
      $_SESSION["items"][$_SESSION["selected_item_pos"]] = $item_update;
      $GLOBALS["success_msg"] = "Item updated properly.";
      unset(
        $_SESSION["selected_item_pos"]
      );
      return;
    }
    $GLOBALS["error_msg"] = "There's another item with the same name.";
  }
  function reset_list():void{
    unset($_SESSION["items"]);
    unset($_SESSION["selected_item_pos"]);
    $_SESSION["total_price"] = 0;
  }
  function calculate_total():void{
    $_SESSION["total_price"] = 
      array_reduce(
        $_SESSION["items"],
        fn($acc, $item) => $acc + $item["cost"]
      );
      $GLOBALS["success_msg"] = "Total calculated properly.";
  }
  // --------------------------------------------------

  function select_item():void{
    $_SESSION["selected_item_pos"] = (int)$_POST["position"];
    $GLOBALS["selected_item"] = $_SESSION["items"][$_SESSION["selected_item_pos"]];
    $GLOBALS["success_msg"] = 
    "Item '{$GLOBALS["selected_item"]["name"]}' selected properly.";
  }
   function delete_item():void{
    $GLOBALS["success_msg"] = 
    "Item '{$_SESSION["items"][$_POST["position"]]["name"]}' deleted properly.";
    unset(
      $_SESSION["items"][$_POST["position"]]
    );
    unset($_SESSION["selected_item_pos"]);

  } 
?>
<?php
  if(isset($_POST["action"])){
    switch ($_POST["action"]) {
      case 'Edit':
        select_item();
        break;
      case 'Delete':
         delete_item();
        break;
    }
  }
  if(isset($_POST["submit"])){
    switch ($_POST["submit"]) {
      case 'Add':
        add_item();
        break;
      case 'Update':
        update_item();
        break;
      case 'Reset':
        reset_list();
        break;
      case 'Calculate total':
        calculate_total();
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
      <input type="text" name="product_name" id="product_name" value="<?php echo $selected_item["name"] ?>"><br>
      <label for="quantity">quantity: </label>
      <input type="number" name="quantity" id="quantity" value="<?php echo $selected_item["quantity"] ?>"><br>
      <label for="price">price: </label>
      <input type="number" name="price" id="price" value="<?php echo $selected_item["price"] ?>"><br>
    </p>
    <input type="submit" value="Add" name="submit">
    <input type="submit" <?php echo isset($_POST["action"]) && $_POST["action"] == "Edit" ? "" : "disabled" ?>
      value="Update" name="submit">
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
        <td><?php echo $_SESSION["total_price"] ?></td>
        <td>
          <input type="submit" value="Calculate total" name="submit" form="main">
        </td>
      </tr>
    </tfoot>
  </table>
</body>

</html>