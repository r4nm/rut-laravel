<?php
/* Copyright (c) 2016 Rodrigo Nannig
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
namespace Rnm;

class Rut {
    private static $RUT_REGEX = "/^(\d{1,8})([\dk])$/i";
    private static $RUT_NUMBER_REGEX = "/^\d{1,8}$/i";

    private static $matrix = [ 3, 2, 7, 6, 5, 4, 3, 2, 1 ];

    public function __construct() {}

    /**
     * Verifica el Rol Unico Tributario (R.u.t) pasado como parametro. 
     *
     * @param rut  Rut sin puntos ni guion
     *
     * @return     Verdadero si el rut es correcto
     */
    public static function isValid($rut) {
        if (static::checkSyntax($rut, static::$RUT_REGEX) === false) {
            return false;
        }

        $rut = strtolower(str_pad($rut, count(static::$matrix), '0', STR_PAD_LEFT));

        for ($i = 0, $sum = 0; $i < count(static::$matrix); $i++) {
            $sum += ($rut[$i] == 'k' ? 10 : $rut[$i]) * static::$matrix[$i];
        }

        return ($sum % 11) == 0; 
    }

    /**
     * Devuelve el digito verificador del numero de Rol Unico Tributario (R.u.t)
     *
     * @param rut  Numero del Rut
     *
     * @return     El digito verificador
     *
     */
    public static function calcCheckDigit($rutNumber) {
        $matrix = array_slice(static::$matrix, 0, count(static::$matrix) - 1);

        if (static::checkSyntax($rutNumber, static::$RUT_NUMBER_REGEX) === false) {
            return false;
        }

        $rutNumber = str_pad($rutNumber, count($matrix), '0', STR_PAD_LEFT);

        for ($i = 0, $sum = 0; $i < count($matrix); $i++) {
            $sum += @$rutNumber[$i] * $matrix[$i];
        }

        return "0123456789k0"[11 - ($sum % 11)];
    }

    /**
     * Devuelve el rut en formato con puntos y guion. ##.###.###-#
     *
     * @param rut  Rut
     *
     * @return     El rut con formato
     *
     */
    public static function format($rut) {
        return preg_replace_callback(static::$RUT_REGEX,
                                     function($r) {
                                         return number_format($r[1], 0, ',', '.').'-'.$r[2];
                                     },
                                     $rut);
    }

    /*
     * Verifica la sintaxis del Rut o el Numero de Rut
     *
     * @param rut      Rut o Numero del Rut
     * @param pattern  El patron de verificacion de sintaxis
     *
     * @return         Verdadero si la sintaxis es correcta
     *
     */
    private static function checkSyntax($rut, $pattern) {
        return ($rut !== null) && preg_match($pattern, $rut);
    }
}
?>
