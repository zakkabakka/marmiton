<?php

namespace Marmiton\Tools;

/**
 * Tools for handling Strings
 */
class StringTools
{
    /**
     * Transform CamelCase string in string_with_underscores format
     *
     * @param  String $str
     * @param  String $case lower or upper, default is lower
     * @return String transformed string
     */
    public static function fromCamelCase($str, $case = 'lower')
    {
        $str[0] = strtolower($str[0]);

        //$new_str = preg_replace('/([A-Z])/e', "'_' . strtolower('\\1')", $str);
        $new_str = preg_replace_callback('/([A-Z])/',
            function($m) { return '_' . strtolower($m[1]); },
            $str );

        $new_str = ($case == 'lower') ?
            $new_str = self::convert_case($new_str, 'lower') :
            $new_str = self::convert_case($new_str, 'upper');

        return $new_str;
    }

    /**
     * Transform string_with_dashes in CamelCase format
     * @param  string  $str
     * @param  boolean $capitaliseFirstChar if true first char is uppercase
     * @return String  transformed string
     */
    public static function toCamelCase($str, $capitaliseFirstChar = false)
    {
        $str = mb_strtolower($str);

        if ($capitaliseFirstChar) {
            $str[0] = strtoupper($str[0]);
        }

        $new_str = preg_replace_callback('/[_-]([a-z])/',
            function($m) { return strtoupper($m[1]); },
            $str );

        return $new_str;
    }

}