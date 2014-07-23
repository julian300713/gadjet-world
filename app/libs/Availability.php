<?php

class Availability{
    //helper to help display either instock or out of stock depending on value
    public static function display($availability) {
        if ($availability == 0) {
            echo "Out of Stock";
        } else if ($availability == 1) {
            echo "In Stock";
        }
    }

    //helper to determine whether to display instock  of class
    public static function displayClass($availability) {
        if ($availability == 0) {
            echo "outofstock";
        } else if ($availability == 1) {
            echo "instock";
        }
    }
}