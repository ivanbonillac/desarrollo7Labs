<?php
class Producto{
    private $conn;
    private $nombre_tabla = "productos";
    
    public $id;
    public $nombre;
    public $descripcion;
    public $precio;
    public $categoria_id;
    public $categoria_desc;
    public $creado;
    
    public function __construct($db){
        $this->conn = $db;
    }
    //Leer producto
    public function read(){
        $query = "SELECT
            c.nombre as categoria_desc, p.id, p.nombre, p.descripcion, p.precio,
            p.categoria_id, p.creado
            FROM
            {$this->nombre_tabla} p
            LEFT JOIN
            categorias c
            ON p.categoria_id = c.id
            ORDER BY
            p.creado DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt;
    }

    //Crear producto
 function crear(){
    // query para insertar un registro
    $query = "INSERT INTO " . $this->nombre_tabla . "
    SET
    nombre=:nombre, precio=:precio, descripcion=:descripcion, categoria_id=:categoria_id, creado=:creado";
    // preparar query
    $stmt = $this->conn->prepare($query);
    // sanitize
    $this->nombre=htmlspecialchars(strip_tags($this->nombre));
    $this->precio=htmlspecialchars(strip_tags($this->precio));
    $this->descripcion=htmlspecialchars(strip_tags($this->descripcion));
    $this->categoria_id=htmlspecialchars(strip_tags($this->categoria_id));
    $this->creado=htmlspecialchars(strip_tags($this->creado));
    // bind values
    $stmt->bindParam(":nombre", $this->nombre);
    $stmt->bindParam(":precio", $this->precio);
    $stmt->bindParam(":descripcion", $this->descripcion);
    $stmt->bindParam(":categoria_id", $this->categoria_id);
    $stmt->bindParam(":creado", $this->creado);
    // execute query
    if($stmt->execute()){
    return true;
    }
    return false;
    
   }

   // utilizado al completar el formulario de actualización del producto
   function readOne() {
    // consulta para leer un solo registro
    $query = "SELECT
        c.nombre as categoria_desc, p.id, p.nombre, p.descripcion, p.precio, p.categoria_id, p.creado
        FROM " . $this->nombre_tabla . " p
        LEFT JOIN categorias c
        ON p.categoria_id = c.id
        WHERE p.id = ?
        LIMIT 0,1";
    
    // preparar declaración de consulta
    $stmt = $this->conn->prepare($query);

    // ID de enlace del producto a actualizar
    $stmt->bindParam(1, $this->id);

    // ejecutar consulta
    $stmt->execute();

    // obtener fila recuperada
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Comprobar si se encontraron datos
    if ($row) {
        // establecer valores a las propiedades del objeto
        $this->nombre = $row['nombre'];
        $this->precio = $row['precio'];
        $this->descripcion = $row['descripcion'];
        $this->categoria_id = $row['categoria_id'];
        $this->categoria_desc = $row['categoria_desc'];
    } else {
        // Si no se encontraron datos, puedes establecer valores predeterminados o generar un mensaje de error
        $this->nombre = null;
        $this->precio = null;
        $this->descripcion = null;
        $this->categoria_id = null;
        $this->categoria_desc = null;
    }
}
function actualizar() {
    $query = "UPDATE " . $this->nombre_tabla . "
              SET nombre = :nombre, precio = :precio, descripcion = :descripcion, categoria_id = :categoria_id
              WHERE id = :id";

    $stmt = $this->conn->prepare($query);

    $this->nombre = htmlspecialchars(strip_tags($this->nombre));
    $this->precio = htmlspecialchars(strip_tags($this->precio));
    $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
    $this->categoria_id = htmlspecialchars(strip_tags($this->categoria_id));
    $this->id = htmlspecialchars(strip_tags($this->id));

    $stmt->bindParam(":nombre", $this->nombre);
    $stmt->bindParam(":precio", $this->precio);
    $stmt->bindParam(":descripcion", $this->descripcion);
    $stmt->bindParam(":categoria_id", $this->categoria_id);
    $stmt->bindParam(":id", $this->id);

    if ($stmt->execute()) {
        return true;
    }
    return false;
}

// Eliminar producto
function eliminar() {
    $query = "DELETE FROM " . $this->nombre_tabla . " WHERE id = :id";

    $stmt = $this->conn->prepare($query);

    $this->id = htmlspecialchars(strip_tags($this->id));

    $stmt->bindParam(":id", $this->id);

    if ($stmt->execute()) {
        return true;
    }
    return false;
}
}
?>
