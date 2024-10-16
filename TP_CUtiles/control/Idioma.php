<?php
use LanguageDetection\Language;

class Idioma extends Language
{
    private $listaIdiomas;

    public function __construct()
    {
        parent::__construct();
        $this->listaIdiomas = [
            'ab' => 'abjasio',
            'af' => 'afrikaans',
            'am' => 'amárico',
            'ar' => 'árabe',
            'ay' => 'aimara',
            'az-Cyrl' => 'azerbaiyano, norte (cirílico)',
            'az-Latn' => 'azerbaiyano, norte (latino)',
            'be' => 'bielorruso',
            'bg' => 'búlgaro',
            'bi' => 'bislama',
            'bn' => 'bengalí',
            'ln' => 'lingala',
            'lo' => 'lao',
            'lt' => 'lituano',
            'lv' => 'letón',
            'mh' => 'marshalés',
            'mn-Cyrl' => 'mongol, halh (cirílico)',
            'ms-Arab' => 'malayo (árabe)',
            'ms-Latn' => 'malayo (latino)',
            'mt' => 'maltés',
            'nb' => 'noruego, Bokmål',
            'ng' => 'ndonga',
            'nl' => 'neerlandés (Holandés)',
            'nn' => 'noruego, Nynorsk',
            'nv' => 'navajo',
            'pl' => 'polaco',
            'pt-BR' => 'portugués (Brasil)',
            'pt-PT' => 'portugués (Portugal)',
            'ro' => 'rumano',
            'ru' => 'ruso',
            'et' => 'estonio',
            'eu' => 'vasco (Euskera)',
            'fa' => 'persa (Farsi)',
            'fi' => 'finés',
            'fj' => 'fiyiano',
            'fo' => 'feroés',
            'fr' => 'francés',
            'fy' => 'frisón',
            'ga' => 'gaélico, irlandés',
            'to' => 'tonga',
            'gd' => 'gaélico, Escocés',
            'tr' => 'turco',
            'tt' => 'tártaro',
            'ty' => 'tahitiano',
            'ug-Arab' => 'uigur (árabe)',
            'ug-Latn' => 'uigur (latino)',
            'uk' => 'ucraniano',
            'hi' => 'hindi',
            'hr' => 'croata',
            'hu' => 'húngaro',
            'hy' => 'armenio',
            'ia' => 'interlingua',
            'id' => 'indonesio',
            'ig' => 'igbo',
            'io' => 'ido',
            'is' => 'islandés',
            'om' => 'afaan oromo',
            'oc' => 'occitano',
            'iu' => 'inuktitut',
            'ja' => 'japonés',
            'jv' => 'javanés',
            'ka' => 'georgiano',
            'km' => 'jemer (Khmer)',
            'ko' => 'coreano',
            'kr' => 'kanuri',
            'ku' => 'kurdo',
            'la' => 'latín',
            'lg' => 'ganda',
            'bo' => 'tibetano',
            'br' => 'bretón',
            'bs-Cyrl' => 'bosnio (cirílico)',
            'bs-Latn' => 'bosnio (latino)',
            'ca' => 'catalán',
            'ch' => 'chamorro',
            'co' => 'corso',
            'cr' => 'cree',
            'cs' => 'checo',
            'cy' => 'galés',
            'de' => 'alemán',
            'da' => 'danés',
            'dz' => 'dzongkha',
            'el-monoton' => 'griego (monotónico)',
            'el-polyton' => 'griego (politónico)',
            'en' => 'inglés',
            'eo' => 'esperanto',
            'es' => 'español',
            'sa' => 'sánscrito',
            'sk' => 'eslovaco',
            'sl' => 'esloveno',
            'so' => 'somalí',
            'sq' => 'albanés',
            'ss' => 'swazi',
            'sv' => 'sueco',
            'ta' => 'tamil',
            'th' => 'tailandés',
            'tl' => 'tagalo',
            'gl' => 'gallego',
            'gn' => 'guaraní',
            'gu' => 'guyaratí',
            'ha' => 'hausa',
            'he' => 'hebreo',
            'ur' => 'urdu',
            'uz' => 'uzbeko',
            've' => 'venda',
            'vi' => 'vietnamita',
            'wa' => 'valón',
            'wo' => 'wolof',
            'xh' => 'xhosa',
            'yo' => 'yoruba',
            'zh-Hans' => 'chino mandarín (simplificado)',
            'zh-Hant' => 'chino mandarín (tradicional)',
            'sw' => 'suajili (Kiswahili)',
            'it' => 'italiano',
        ];

    }

    public function getListaIdiomas()
    {
        return $this->listaIdiomas;
    }

    public function mostrarPorcentaje($probabilidad)
    {
        return round($probabilidad * 100, 2);
    }

    /**
     * Función para mostrar los idiomas más probables.
     * Retorna un array con los idiomas detectados y su probabilidad.
     * @param string $texto
     * @return array
     * */
    public function detectarIdioma($texto)
    {
        $resultado = $this->detect($texto)->bestResults()->close();
        return $resultado;
    }

    /**
     * Transforma el código de idioma en el nombre completo del idioma.
     * @param string $codigo
     * @return string
     */
    public function obtenerNombreIdioma($codigo)
    {
        $listaIdiomas = $this->getListaIdiomas();
        return isset($listaIdiomas[$codigo]) ? $listaIdiomas[$codigo] : $codigo;
    }

    /**
     * Retorna solo el primer resultado de la detección de idioma, con el idioma con su nombre completo y la probabilidad pasada a porcentaje.
     * @param string $texto
     * @return array
     */
    public function mostrarPrimerResultado($texto)
    {
        $resultado = $this->detectarIdioma($texto);
        $primerResultado = array_key_first($resultado);
        $nombreIdioma = $this->obtenerNombreIdioma($primerResultado);
        $probabilidad = $this->mostrarPorcentaje($resultado[$primerResultado]);
        $arregloResultado = [$nombreIdioma => $probabilidad];
        return $arregloResultado;
    }

    /**
     * Función que retorna todos los resultados de la detección de idioma, con el texto y los idiomas (con nombre completo) detectados con su probabilidad (en porcentaje).
     * @param array $textos
     * @return array
     */
    public function mostrarTodosLosResultados($textos)
    {
        $resultadosFinales = [];
        foreach ($textos as $texto) {
            $resultado = $this->detect($texto)->close();
            $arregloResultados = [];
            foreach ($resultado as $codigoIdioma => $probabilidad) {
                $nombreIdioma = $this->obtenerNombreIdioma($codigoIdioma);
                $probabilidad = $this->mostrarPorcentaje($probabilidad);
                $arregloResultados[] = [$nombreIdioma => $probabilidad];
            }
            $resultadosFinales[] = [
                "texto" => $texto,
                "resultados" => $arregloResultados
            ];
        }
        return $resultadosFinales;
    }

}
