<?php 
  $datos = [
    "nombre" => "Sara",
    "apellido" => "Martínez",
    "edad" => 23,
    "ciudad" => "Barcelona",
    ]
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicios Arrays</title>
</head>

<body>
  <h1>
    Ejercicio 1
  </h1>
  <p>
    <?php 
    $index_ej_1 = 1;
      foreach ($datos as $key => $value) {
        echo "dato {$index_ej_1}º: ". $value ."<br>";
        $index_ej_1++;
      }
    ?>
  </p>
  <!-- ------------------------------------------------------------- -->
  <h1>
    Ejercicio 2
  </h1>
  <p>
    <?php 
      foreach ($datos as $key => $value) 
        echo "$key: $value<br>";
    ?>
  </p>
  <!-- ------------------------------------------------------------- -->
  <h1>
    Ejercicio 3
  </h1>
  <p>
    <?php 
    $datos["edad"] = 24;
    $index_ej_3 = 1;
      foreach ($datos as $key => $value) {
        echo "dato {$index_ej_3}º: ". $value ."<br>";
        $index_ej_3++;
      }
    ?>
  </p>
</body>

</html>