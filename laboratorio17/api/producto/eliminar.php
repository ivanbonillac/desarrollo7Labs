<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
include_once '../configuracion/conexion.php';
include_once '../objetos/producto.php';

$conexion = new Conexion();
$db = $conexion->obtenerConexion();
$producto = new Producto($db);

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->id)) {
    $producto->id = $data->id;

    if ($producto->eliminar()) {
        http_response_code(200);
        echo json_encode(array("message" => "El producto ha sido eliminado."));
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "No se pudo eliminar el producto."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "No se puede eliminar el producto. Datos incompletos."));
}
?>

<!-- Esto se prueba con el metodo Delete en el postman -->