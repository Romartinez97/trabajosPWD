<?php
class HorasSemanales
{

    private $horasLunes;
    private $horasMartes;
    private $horasMiercoles;
    private $horasJueves;
    private $horasViernes;

    public function __construct($datos)
    {
        $this->horasLunes = $datos["horasLunes"];
        $this->horasMartes = $datos["horasMartes"];
        $this->horasMiercoles = $datos["horasMiercoles"];
        $this->horasJueves = $datos["horasJueves"];
        $this->horasViernes = $datos["horasViernes"];
    }

    public function getHorasLunes()
    {
        return $this->horasLunes;
    }

    public function getHorasMartes()
    {
        return $this->horasMartes;
    }

    public function getHorasMiercoles()
    {
        return $this->horasMiercoles;
    }

    public function getHorasJueves()
    {
        return $this->horasJueves;
    }

    public function getHorasViernes()
    {
        return $this->horasViernes;
    }

    public function getTotalHoras()
    {
        return $this->horasLunes + $this->horasMartes + $this->horasMiercoles + $this->horasJueves + $this->horasViernes;
    }

}