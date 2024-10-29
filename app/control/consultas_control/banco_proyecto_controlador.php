<?php
require_once MODELO_PATH . 'consultas_model' . DS . 'banco_proyecto_model.php';

class BancoProyectoController {
    private static $instancia;

    // Implementación del patrón Singleton
    public static function singleton_conexion() {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }

    // Método para obtener los proyectos del usuario
    public function obtenerProyectosPorUsuario($id_usuario) {
        $result = BancoProyecto::proyectosPorUsuario($id_usuario);
        return $result;
    }

    // Método para obtener proyectos paginados por usuario
    public function obtenerProyectosPaginadosPorUsuario($id_usuario, $inicio, $limite) {
        return BancoProyecto::proyectosPaginadosPorUsuario($id_usuario, $inicio, $limite);
    }

    // Método para contar el total de proyectos del usuario
    public function contarProyectosPorUsuario($id_usuario) {
        return BancoProyecto::contarProyectos($id_usuario);
    }

    // Método para obtener todos los proyectos sin filtrar por usuario
    public function obtenerTodosLosProyectos() {
        return BancoProyecto::todosLosProyectos();
    }

    // Método para obtener proyectos paginados sin filtrar por usuario
    public function obtenerProyectosPaginados($inicio, $limite) {
        return BancoProyecto::proyectosPaginados($inicio, $limite);
    }

// Método para actualizar el estado de un proyecto
public function actualizarEstadoProyecto($id_proyecto, $nuevo_estado) {
    return BancoProyecto::actualizarEstado($id_proyecto, $nuevo_estado);
}

}
?>
