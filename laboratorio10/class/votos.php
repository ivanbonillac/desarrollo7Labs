<?php
require_once('modelo.php');

class Votos extends modeloCredencialesBD {
    public function __construct() {
        parent::__construct();
    }

    public function listarVotos() {
        $instruccion = "CALL sp_listar_votos()";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        $consulta->close();
        $this->_db->close();

        if ($resultado) {
            return $resultado;
        }
    }

    public function actualizarVotos($votos1, $votos2) {
        $instruccion = "CALL sp_actualizar_votos('$votos1', '$votos2')";
        $actualiza = $this->_db->query($instruccion);
        $this->_db->close();

        if ($actualiza) {
            return $actualiza;
        }
    }
}
?>
