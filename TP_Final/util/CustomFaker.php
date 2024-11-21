<?php
require_once __DIR__ . '/../vendor/autoload.php';
use Faker\Factory;

class Customfaker
{

    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create('es_AR');
    }

    public function generarUsuarios($cantidad, $rol)
    {
        $abmUsuario = new AbmUsuario();
        $abmUsuariorol = new AbmUsuariorol();
        $resp = true;

        for ($i = 0; $i < $cantidad; $i++) {
            $datosUsuario = [
                "idusuario" => null,
                "usnombre" => $this->faker->name(),
                "usmail" => $this->faker->unique()->email(),
                "uspass" => $this->faker->regexify('[A-Za-z0-9]{8}'),
                "usdeshabilitado" => $this->faker->dateTimeThisDecade()->format('Y-m-d H:i:s'),
            ];

            if ($abmUsuario->alta($datosUsuario)) {
                //Busco ID del usuario insertado para añadirle el rol
                $usuarioInsertado = $abmUsuario->buscar(["usmail" => $datosUsuario["usmail"]]);
                if (!empty($usuarioInsertado)) {
                    $idUsuarioInsertado = $usuarioInsertado[0]->getIdusuario();
                    $datosUsuarioRol = [
                        "idusuario" => $idUsuarioInsertado,
                        "idrol" => $rol
                    ];
                    if (!$abmUsuariorol->alta($datosUsuarioRol)) {
                        $resp = false;
                        break;
                    }
                } else {
                    $resp = false;
                    break;
                }
            } else {
                $resp = false;
                break;
            }
        }

        return $resp;
    }

    public function generarLibros($cantidad)
    {
        $abmProducto = new AbmProducto();
        $resp = true;

        for ($i = 0; $i < $cantidad; $i++) {
            $datosLibro = [
                "idproducto" => null,
                "pronombre" => $this->faker->sentence(3),
                "prodetalle" => "Escritor/a: " . $this->faker->name(),
                "procantstock" => $this->faker->numberBetween(1, 100),
                "progenero" => $this->faker->randomElement(["Aventura", "Ciencia Ficción", "Literatura Contemporánea", "Fantasía", "Historia", "Literatura Infantil", "Poesía", "Romance", "Terror"]),
                "proprecio" => $this->faker->randomFloat(2, 1000, 20000),
            ];

            if (!$abmProducto->alta($datosLibro)) {
                $resp = false;
                break;
            }
        }

        return $resp;
    }

}
?>