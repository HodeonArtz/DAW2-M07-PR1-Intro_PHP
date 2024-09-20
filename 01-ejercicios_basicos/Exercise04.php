<?php 
  $n_dado = rand(1,6);
  $n_opuesto = 7-$n_dado;
  $nums_en_letras = ["Uno","Dos","Tres","Cuatro","Cinco","Seis"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 4</title>
</head>

<body>
  <p>
    Dado: <?php echo $n_dado ?>
  </p>
  <p>
    Cara opuesta: <?php echo $n_opuesto ." (". $nums_en_letras[$n_opuesto-1] .")" ?>
  </p>
</body>

</html>