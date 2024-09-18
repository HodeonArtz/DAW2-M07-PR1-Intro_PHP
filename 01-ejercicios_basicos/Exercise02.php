<?php
  $n_dia_semana = rand(-3,10);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 2</title>
</head>

<body>
  <p>
    Número del día de la semana: <?php echo $n_dia_semana; ?>
  </p>
  <p>
    Día: <?php 
      switch ($n_dia_semana) {
        case 1: echo "Lunes"; break;
        case 2: echo "Martes"; break;
        case 3: echo "Miércoles"; break;
        case 4: echo "Jueves"; break;
        case 5: echo "Viernes"; break;
        case 6: echo "Sábado"; break;
        case 7: echo "Domingo"; break;
        default:
          echo "No hay ningún día que corresponda con este número";
          break;
      }
    ?>
  </p>
</body>

</html>