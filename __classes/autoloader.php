<?php

//Autoloader
spl_autoload_register(function($className){
    require '__classes/'.$className.'.php';
});