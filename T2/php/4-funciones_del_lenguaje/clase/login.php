<?php
require_once 'config.php';
require_once 'anonymousfn.php';


onMessage("success", function($message) {
    echo "REDIRECCIONANDO A INDEX.PHP... ($message)";
});


?>