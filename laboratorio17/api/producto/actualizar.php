<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
include_once '../configuracion/conexion.php';
include_once '../objetos/producto.php';

$conexion = new Conexion();
$db = $conexion->obtenerConexion();
$producto = new Producto($db);

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->id) && !empty($data->nombre) && !empty($data->precio)) {
    $producto->id = $data->id; // Asegúrate de asignar el ID
    $producto->nombre = $data->nombre;
    $producto->precio = $data->precio;
    $producto->descripcion = $data->descripcion;
    $producto->creado = date('Y-m-d H:i:s');

    if ($producto->actualizar()) {
        http_response_code(200);
        echo json_encode(array("message" => "El producto ha sido actualizado."));
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "No se pudo actualizar el producto."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "No se puede actualizar el producto. Datos incompletos."));
}
?>
