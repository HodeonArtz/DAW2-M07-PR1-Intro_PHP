<?php 
  $num1 = rand(10,100);
  $num2 = rand(10,100);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 3</title>
</head>

<body>
  <p>1er número: <?php echo $num1 ?></p>
  <p>2do número: <?php echo $num2 ?></p>
  <!-- ------------------------------------------------------------- -->
  <p>Números pares 0-<?php echo $num1 ?>: </p>
  <?php 
    for ($i=0; $i < $num1; $i+=2) { 
      echo "$i ";
    }
    // También se podría utilizar el operando %  en la condición de un if para mostrar el número si es par
  ?>
  <!-- ------------------------------------------------------------- -->
  <p>Números <?php echo "$num1-$num2" ?>:</p>
</body>

</html>