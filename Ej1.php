<!DOCTYPE html>
<html lang="es">        
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>

</head>
<body>

<h1>Calculadora de Envíos EJ1</h1>  
<form method="post">
    <label for="length">Largo (m):</label>
    <input type="number" name="length" id="length" required>

    <label for="width">Ancho (m):</label>
    <input type="number" name="width" id="width" required>

    <label for="height">Alto (m):</label>
    <input type="number" name="height" id="height" required>

    <label for="weight">Peso (kg):</label>
    <input type="number" name="weight" id="weight" required>

    <label for="quantity">Cantidad de paquetes:</label>
    <input type="number" name="quantity" id="quantity" required>

    <label for="zone">Zona de envío:</label>
    <select name="zone" id="zone" required>
        <option value="peninsula">Península</option>
        <option value="baleares_mar">Baleares (Marítimo)</option>
        <option value="baleares_aer">Baleares (Aéreo)</option>
        <option value="canarias">Canarias</option>
    </select>

    <button type="submit">Calcular precio</button>
</form>

<p id="result">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $length = floatval($_POST['length']);
    $width = floatval($_POST['width']);
    $height = floatval($_POST['height']);
    $weight = floatval($_POST['weight']);
    $quantity = intval($_POST['quantity']);
    $zone = $_POST['zone'];

    $volume = $length * $width * $height;
    $precio_base = 0;

    if ($volume <= 0.5) {
        $precio_base = $volume * 50;
    } elseif ($volume <= 1) {
        $precio_base = $volume * 75; 
    } else {
        $precio_base = $volume * 100; 
    }

    if ($weight > 15) {
        echo "El envío es desestimado por peso excesivo sorry";
    } else {
        if ($weight > 10) {
            $precio_base *= 1.5; 
        } elseif ($weight > 5) {
            $precio_base *= 1.25; 
        }

        if ($zone === 'baleares_aer') {
            $precio_base *= 1.1;
        } elseif ($zone === 'canarias') {
            $precio_base *= 1.1;
        }

        $precio_final = $precio_base * $quantity;

        echo "El precio total del envio para $quantity paquete(s) es: €" . number_format($precio_final, 2);
    }
}
?>
</p>

</body>
</html>