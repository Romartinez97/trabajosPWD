<?

class BaseDatosPDO extends PDO
{

    private $engine; //motor de la Base de Datos
    private $host; //servidor de la Base de Datos
    private $database; //nombre de la Base de Datos
    private $user; //usuario con el que nos conectaremos
    private $pass; //clave del usuario
    private $debug; //valor booleano que indicara si queremos que nos muestre las consultas o no

    //---------
    private $error;
    private $sql;
    //---------
    private $conec;
    private $indice;
    private $resultado;

    public function __construct()
    {
        $this->engine = "mysql";
        $this->host = "localhost";
        $this->database = "infousuarios";
        $this->user = "root";
        $this->pass = "";
        $this->debug = true;
        $this->error = "";
        $this->sql = "";
        $this->indice = 0;

        $dns = $this->engine . ":dbname=" . $this->database . ";host=" . $this->host;
        try {
            parent::__construct($dns, $this->user, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->conec = true;
        } catch (PDOException $e) {
            $this->sql = $e->getMessage();
            $this->conec = false;
        }
    }


    /**
     * Inicia la conexión con el servidor y la base de datos MySQL.
     * Retorna true si la conexión se pudo establecer y false en caso contrario
     * @return boolean
     */
    public function Iniciar()
    {
        return $this->getConec();
    }

    public function getConec()
    {
        return $this->conec;
    }

    public function setDebug($debug)
    {
        $this->debug = $debug;
    }

    public function getDebug()
    {
        return $this->debug;
    }

    private function setIndice($indice)
    {
        $this->indice = $indice;
    }

    private function getIndice()
    {
        return $this->indice;
    }

    private function setResultado($resultado)
    {
        $this->resultado = $resultado;
    }

    private function getResultado()
    {
        return $this->resultado;
    }

    public function setError($e)
    {
        $this->error = $e;
    }

    public function getError()
    {
        return "\n" . $this->error;
    }

    public function setSql($sql)
    {
        $this->sql = $sql;
    }

    public function getSql()
    {
        return "\n" . $this->sql;
    }

    public function Ejecutar($sql)
    {
        $this->setError("");
        $this->setSQL($sql);
        //Se desea ejecutar un insert
        if (stristr($sql, "insert")) {
            $resp = $this->EjecutarInsert($sql);
        }
        //Se desea ejecutar un update o delete
        if (stristr($sql, "update")) {
            $resp = $this->EjecutarDeleteUpdate($sql);
        }
        //Se desea ejecutar un select
        if (stristr($sql, "select")) {
            $resp = $this->EjecutarSelect($sql);
        }
        return $resp;
    }

    /**
     * Si se inserta en una tabla que tiene una columna autoincrement
     * se retorna el id con el que se inserto el registro.
     * En caso contrario se retorna -1.
     * @param mixed $sql
     * @return bool|int|string
     */
    public function EjecutarInsert($sql)
    {
        $resultado = parent::query($sql);
        if (!$resultado) {
            $this->analizarDebug();
            $id = 0;
        } else {
            $id = $this->lastInsertId();
            if ($id == 0) {
                $id = -1;
            }
        }
        return $id;
    }

    /**
     * Devuelve la cantidad de filas afectadas por la ejecucion SQL.
     * Si el valor es < 0 no se pudo realizar la operacion.
     * @param mixed $sql
     * @return int
     */
    public function EjecutarDeleteUpdate($sql)
    {
        $cantFilas = -1;
        $resultado = parent::query($sql);
        if (!$resultado) {
            $this->analizarDebug();
        } else {
            $cantFilas = $resultado->rowCount();
        }
        return $cantFilas;
    }

    /**
     * Retorna cada uno de los registros de una consulta select.
     * @param mixed $sql
     * @return int
     */
    public function EjecutarSelect($sql)
    {
        $cant = -1;
        $resultado = parent::query($sql);
        if (!$resultado) {
            $this->analizarDebug();
        } else {
            $arregloResult = $resultado->fetchAll();
            $cant = count($arregloResult);
            $this->setIndice(0);
            $this->setResultado($arregloResult);
        }
        return $cant;
    }

    /**
     * Devuelve un registro retornado por la ejecución de una consulta.
     * El puntero se desplaza al siguiente registro de la consulta.
     * @return mixed
     */
    public function Registro()
    {
        $filaActual = false;
        $indiceActual = $this->getIndice();
        if ($indiceActual >= 0) {
            $filas = $this->getResultado();
            if ($indiceActual < count($filas)) {
                $filaActual = $filas[$indiceActual];
                $indiceActual++;
                $this->setIndice($indiceActual);
            } else {
                $this->setIndice(-1);
            }
        }
        return $filaActual;
    }

    /**
     * Esta función visualiza el debug si esta seteada
     * la variable instancia $this->debug
     * @return void
     */
    public function analizarDebug()
    {
        $e = $this->errorInfo();
        $this->setError($e);
        if ($this->getDebug()) {
            echo "<pre>";
            print_r($e);
            echo "</pre>";
        }
    }

}