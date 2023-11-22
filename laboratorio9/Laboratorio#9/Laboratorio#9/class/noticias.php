<?php
require_once('modelo.php');

class Noticia extends modeloCredencialesBD {
    protected $titulo;
    protected $texto;
    protected $categoria;
    protected $fecha;
    protected $imagen;

    public function __construct() {
        parent::__construct();
    }

    public function consultar_noticias() {
        $instruccion = "CALL sp_listar_noticias()";
        $consulta = $this->_db->query($instruccion);
        
        if (!$consulta) {
            throw new Exception("Error al consultar las noticias: " . $this->_db->error);
        }

        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        $consulta->close();
        return $resultado;
    }

    public function consultar_noticias_filtro($campo, $valor) {
        $instruccion = "CALL sp_listar_noticias_filtro('".$campo."','". $valor."')";
        $consulta = $this->_db->query($instruccion);
        
        if (!$consulta) {
            throw new Exception("Error al consultar las noticias con filtro: " . $this->_db->error);
        }

        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        $consulta->close();
        return $resultado;
    }

    public function __destruct() {
        if ($this->_db) {
            $this->_db->close();
        }
    }
}
?>
