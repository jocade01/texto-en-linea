<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>

</head>
<body>

<h1>Conjetura de Collatz</h1>
<form method="post">
    <label for="number">Ingresa un número entero positivo:</label>
    <input type="number" name="number" id="number" required>
    <button type="submit">Comprobar</button>
</form>

<p id="result">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = intval($_POST['number']);

    if ($number <= 0) {
        echo "por favor ingresa un numero entero positivo";
    } else {
        $sequenciacollatz = [];
        
        while ($number != 1) {
            $sequenciacollatz[] = $number; 
            if ($number % 2 == 0) {
                $number = $number / 2; 
            } else {
                $number = $number * 3 + 1; 
            }
        }
        $sequenciacollatz[] = 1; 
        
        echo "La sucesión de Collatz es: " . implode(", ", $sequenciacollatz);
    }
}
?>
</p>

</body>
</html>