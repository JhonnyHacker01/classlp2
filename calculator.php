<?php
include('config.php');

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero1 = $_POST['numero1'];
    $numero2 = $_POST['numero2'];
    $operacion = $_POST['operacion'];

    // Validar que los números sean válidos
    if (is_numeric($numero1) && is_numeric($numero2)) {
        switch ($operacion) {
            case 'suma':
                $resultado = $numero1 + $numero2;
                break;
            case 'resta':
                $resultado = $numero1 - $numero2;
                break;
            case 'multiplicacion':
                $resultado = $numero1 * $numero2;
                break;
            case 'division':
                if ($numero2 != 0) {
                    $resultado = $numero1 / $numero2;
                } else {
                    $resultado = 'Error: División por cero';
                }
                break;
            default:
                $resultado = 'Operación no válida';
                break;
        }

        // Insertar el cálculo en la base de datos
        $stmt = $pdo->prepare("INSERT INTO calculos (numero1, numero2, operacion, resultado) VALUES (?, ?, ?, ?)");
        $stmt->execute([$numero1, $numero2, $operacion, $resultado]);

        echo "Resultado: $resultado";
    } else {
        echo "Por favor, ingrese números válidos.";
    }
}
?>
