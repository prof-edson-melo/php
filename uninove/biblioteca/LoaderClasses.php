<?php

class LoaderClass {

    public static function carrega($classe) {
        if (file_exists("modelos/{$classe}.php")) {
            include_once "modelos/{$classe}.php";
        }
    }

}
