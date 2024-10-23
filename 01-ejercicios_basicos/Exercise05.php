<?php 
  $n_numeros_pares = 0;
  $n_numeros_impares = 0;
  $valor_generado = 0;
  $total= 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 05</title>
</head>

<body>
  <p>
    Números:
    <?php 

      do {
        $valor_generado = rand(0,20);
        if($valor_generado % 2 == 0) $n_numeros_pares++;
        if($valor_generado % 2 != 0) $n_numeros_impares++;
        echo "$valor_generado ";
      } while (($total += $valor_generado) < 100);
    ?>
  </p>
  <p>
    Total: <?php echo $total ?>
  </p>
  <p>
    Cantidad de números pares: <?php echo $n_numeros_pares ?>
  </p>
  <p>
    Cantidad de números impares: <?php echo $n_numeros_impares ?>
  </p>
</body>

</html>