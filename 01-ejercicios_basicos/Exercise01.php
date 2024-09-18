<?php 
  $num1 = rand(-100,100);
  $num2 = rand(-100,100);
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 1</title>
</head>

<body>
  <p>
    1er Número:
    <?php 
      echo $num1
    ?>
  </p>
  <p>
    2er Número:
    <?php 
      echo $num2
    ?>
  </p>
  <p>
    <?php echo $num1 ?> + <?php echo $num2 ?> =
    <?php echo $num1 + $num2; ?>
  </p>
  <p>
    <?php echo $num1 ?> - <?php echo $num2 ?> =
    <?php echo $num1 - $num2; ?>
  </p>
  <p>
    <?php echo $num1 ?> / <?php echo $num2 ?> =
    <?php echo $num1 / $num2; ?>
  </p>
  <p>
    <?php echo $num1 ?> es <?php 
      echo $num1 > $num2 ? "mayor" : ($num1 < $num2 ? "menor" : "igual");
    ?> que <?php echo $num2 ?>
  </p>
</body>

</html>