<?php
namespace DWA;
class Tools {
    /**
    * Pretty print given value to screen
    */
    public static function dump($mixed = null) {
        echo '<pre>';
        var_dump($mixed);
        echo '</pre>';
    }
    # Alias for above method
    public static function d($mixed = null) {
        self::dump($mixed);
    }
    /**
    * Pretty print given value to screen, then die
    */
    public static function diedump($mixed = null) {
        self::dump($mixed);
        die();
    }
    # Alias for above method
    public static function dd($mixed = null) {
        self::diedump($mixed);
    }
    /**
    * The only method I use in Form class, and I wanted it static.
    * So I brought it over into my Tools class and removed Form from the package.
    * Strips HTML characters; works with arrays or scalar values
    */
    public static function sanitize($mixed = null) {
        # Base case
        if(!is_array($mixed)) {
            return htmlentities($mixed, ENT_QUOTES, "UTF-8");
        }
        else {
            return sanitize(array_shift($mixed));
        }
        return $mixed;
    }
} # end of class
