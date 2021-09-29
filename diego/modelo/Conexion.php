<?php

class Conexion
{

    private $_servidor, $_usuario, $_clave, $_bd;
    protected $_conexion;

    //Metodo Constructor
    private $HOST = "linux";
    public function __construct()
    {
        $this->_bd = 'prueba_tecnica_dev';
        $this->_usuario = 'root';
        $this->_clave = '';
        $this->_servidor = 'localhost';

        if (!isset($this->_conexion)) {
            $this->_conexion = (mysqli_connect($this->_servidor, $this->_usuario, $this->_clave, $this->_bd)) or die(mysqli_connect_errno());
            mysqli_set_charset($this->_conexion, 'utf8');
            //echo "<script>alert('conexión realizada');</script>";
        } else {
            echo "<script>alert('No se pudo realizar la conexión');</script>";
        }
    }

    public function consultarDML($dml)
    {
        $resultado = mysqli_query($this->_conexion, $dml);
        //$numfilas = mysql_num_rows($resultado);
        $i = 0;
        while ($consulta = mysqli_fetch_assoc($resultado)) {
            $lista[$i] = $consulta;
            $i++;
        }
        return $lista;
    }

    public function ejecutarDML($dml)
    {
        $resultado = mysqli_query($this->_conexion, $dml);
        $msg = "OK";
        if (!$resultado) {
            $err = 'MySQL Error: ' . mysqli_error($this->_conexion);
            $msg = "No se pudo ejecutar el proceso solicitado $err";
        }
        return $msg;
    }

    public function contarFilas($dml)
    {
        $resultado = mysqli_query($this->_conexion, $dml);
        $numFilas = mysqli_num_rows($resultado);
        return $numFilas;
    }

    function __destruct()
    {
        @mysqli_close($this->_conexion);
    }
}
