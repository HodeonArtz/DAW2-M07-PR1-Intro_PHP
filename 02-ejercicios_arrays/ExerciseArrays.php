<?php 
  /* Ej 1 */
  $datos = [
    "nombre" => "Sara",
    "apellido" => "Martínez",
    "edad" => 23,
    "ciudad" => "Barcelona",
  ];
  /* Ej 5 */
  $letters = "a,b,c,d,e,f";
  /* Ej 6 */
  $notas_estudiantes = [
    "Miguel"=> 5,
    "Luís"=>7,
    "Marta"=>10,
    "Isabel"=>8,
    "Aitor"=>4,
    "Pepe"=>1
  ];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicios Arrays</title>
</head>

<l>
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
  <!-- ------------------------------------------------------------- -->
  <h1>Ejercicio 4</h1>
  <p>
    <?php 
      unset($datos["ciudad"]);
      var_dump($datos);
    ?>
  </p>
  <!-- ------------------------------------------------------------- -->
  <h1>Ejercicio 5</h1>
  <p>
    <?php 
      $arr_letters = array_reverse(explode(",",$letters));
      $index_ej_5 = count($arr_letters);
      foreach ($arr_letters as $key => $value) {
        echo "letter {$index_ej_5}º: $value <br>";
        $index_ej_5--; 
      }
      
    ?>
  </p>
  <!-- ------------------------------------------------------------- -->
  <h1>Ejercicio 6</h1>
  <p>
    Notas de los estudiantes:
    <?php 
      $notas_ordenadas= $notas_estudiantes;
      arsort($notas_ordenadas);
      foreach ($notas_ordenadas as $key => $value){
        echo "$key: $value ";
      }
    ?>
  </p>
  <!-- ------------------------------------------------------------- -->
  <h1>Ejercicio 7</h1>
  <p>
    Media de las notas:
    <?php 
      function sum($acc, $el): int{
        $acc += $el;
        return $acc;
      }
      $media_notas = array_reduce($notas_estudiantes,"sum") / count($notas_estudiantes);
      echo number_format($media_notas,2);
    ?>
  </p>
  <p>
    Alumnos con nota por encima de la media:
  </p>
  <p>
    <?php 
      function nota_es_superior_a_media(int $nota): bool{
        return $nota > $GLOBALS["media_notas"];
      }
      foreach (array_filter($notas_estudiantes,"nota_es_superior_a_media") as $key => $value) {
        echo "$key <br>";
      }
    ?>
  </p>
</l>

</html>